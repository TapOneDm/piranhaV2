<?php

namespace app\controllers\base;

use Yii;
use yii\web\Controller;

class BaseController extends Controller {
    CONST GALLERY_LIST_AJAX_URL = '/site/gallery-list';

    public function __construct($id, $module=null){
        parent::__construct($id, $module);

        $languageList = Yii::$app->translateManager->supportedLanguages;
        preg_match('%^/('.implode('|', $languageList).')(/|$)%', $_SERVER['REQUEST_URI'], $m);

        if (preg_match('%^/('.implode('|', $languageList).')(/|$)%', $_SERVER['REQUEST_URI'], $m)) {
            Yii::$app->language = $m[1];
            return;
        }

        $redirectToLanguage = 'ru';
        $langs = [];

        // detect language based on browsers accept-language header
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            // break up string into pieces (languages and q factors)
            preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);

            if (count($lang_parse[1])) {
                // create a list like "en" => 0.8
                $langs = array_combine($lang_parse[1], $lang_parse[4]);

                // set default to 1 for any without q factor
                foreach ($langs as $lang => $val) {
                    if ($val === '') $langs[$lang] = 1;
                }

                // sort list based on value
                arsort($langs, SORT_NUMERIC);
            }
        }

        // look through sorted list and use first one that matches our languages
        foreach ($langs as $lang => $val) {
            if (preg_match('%^('.implode('|', $languageList).')%', $lang, $matches)) {
                $redirectToLanguage = $matches[1];
                break;
            }
        }

        if (!str_starts_with($_SERVER['REQUEST_URI'], static::GALLERY_LIST_AJAX_URL)) {
            $this->redirect('/'.$redirectToLanguage.$_SERVER['REQUEST_URI'], 301);
        }
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }
}