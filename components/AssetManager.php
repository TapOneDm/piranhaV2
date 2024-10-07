<?php

namespace app\components;

use Yii;
use yii\base\InvalidArgumentException;
use yii\base\InvalidConfigException;


class AssetManager extends \yii\web\AssetManager {

    private $_published = [];

    public function publish($path, $options = [])
    {
        $path = Yii::getAlias($path);

        if (isset($this->_published[$path])) {
            return $this->_published[$path];
        }

        $src=$path;

        if (!is_string($path) || !is_dir($src)) {
            throw new InvalidArgumentException("The file or directory to be published does not exist: $path");
        }

        if (!is_writable($this->basePath)) {
            throw new InvalidConfigException("The directory is not writable by the Web process: {$this->basePath}");
        }

        if (is_file($src)) {
            return $this->_published[$path] = $this->publishFile($src);
        }

        return $this->_published[$path] = $this->publishDirectory($src, $options);
    }

    public function getPublishedPath($path) {
        $path = Yii::getAlias($path);

        if (isset($this->_published[$path])) {
            return $this->_published[$path][0];
        }

        if (is_string($path) && ($path = realpath($path)) !== false) {
            return $this->basePath . DIRECTORY_SEPARATOR . $this->hash($path) . (is_file($path) ? DIRECTORY_SEPARATOR . basename($path) : '');
        }

        return false;
    }
}