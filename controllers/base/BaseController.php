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

        $redirectToLanguage = 'en';

        if (!str_starts_with($_SERVER['REQUEST_URI'], static::GALLERY_LIST_AJAX_URL)) {
            $this->redirect('/'.$redirectToLanguage.$_SERVER['REQUEST_URI'], 301);
        }
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }
}