<?php

namespace app\components;

use Yii;


class TranslateManager
{
    public $supportedLanguages;
    public $cacheDuration;

    public function translate($callback, $cacheKey = '')
    {
        $data = $cacheKey ? Yii::$app->cache->get($cacheKey) : false;
        $data = false;
        if ($data === false) {
            $data = [];

            foreach ($this->supportedLanguages as $language) {
                Yii::$app->language = $language;
                $data[$language] = call_user_func($callback, $language);
            }

            if ($cacheKey) {
                Yii::$app->cache->set($cacheKey, $data, $this->cacheDuration);
            }
        }
        
        return $data;
    }

    public function getLanguagesList()
    {
        $list = [];

        foreach ($this->supportedLanguages as $languageIndex => $language) {
            $list[] = [
                'code' => is_string($languageIndex) ? $languageIndex : $language,
                'title' => $language
            ];
        }

        return $list;
    }
}
