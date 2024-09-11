<?php

namespace app\components;

use yii\base\Component;

class Helper extends Component
{

    public static function getRandStr($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function getDirFilesCount($dir)
    {
        $d = opendir($dir);
        $count = 0;
        while ($file = readdir($d)) {
            if ($file == '.' || $file == '..' || is_dir($dir . $file)) {
                continue;
            }
            $count++;
        }
        return $count;
    }

    public static function makeDir($basePath)
    {
        $dirname = self::getRandStr(10);
        $path = $basePath . '/' . $dirname;
        mkdir($path);
        return $path;
    }

    public static function alternate_chunck($array, $parts)
    {
        $t = 0;
        $result = array();
        $max = ceil(count($array) / $parts);
        foreach (array_chunk($array, $max) as $v) {
            if ($t < $parts) {
                $result[] = $v;
            } else {
                foreach ($v as $d) {
                    $result[] = array($d);
                }
            }
            $t += count($v);
        }
        return $result;
    }

    public static function fill_chunck($array, $parts)
    {
        $t = 0;
        $result = array_fill(0, $parts - 1, array());
        $max = ceil(count($array) / $parts);
        foreach ($array as $v) {
            count($result[$t]) >= $max and $t++;
            $result[$t][] = $v;
        }
        return $result;
    }
}
