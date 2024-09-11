<?php

namespace app\components;
use Yii;

class language
{
    public static function getLanguage()
    {
        if (isset($_COOKIE['language'])) {
            return $_COOKIE['language'];
        }
        
        return 'en';
    }

    public static function getTr($attr)
    {
        $langPostfix = static::getLanguage();
        return $langPostfix === 'ru' ? $attr : $attr . '_' . $langPostfix;
    }

    public static function getStaticTr($translations)
    {
        return $translations[static::getLanguage()];
    }
}
