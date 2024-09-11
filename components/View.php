<?php

namespace app\components;

use Yii;


class View extends \yii\web\View {
    const LAZY_IMAGE_PLACEHOLDER = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

    public function getPlaceholder()
    {
        return static::LAZY_IMAGE_PLACEHOLDER;
    }

    public function getWebsiteHomeUrl()
    {
        return Yii::$app->request->hostInfo . '/'. Yii::$app->language .'/';
    }

    // public function registerCssFile($url, $depends = [], $options = [], $key = null) {
    //     parent::registerCssFile($this->addModifyTimeToUrl($url),$depends,$options,$key);
    // }

    // public function registerJsFile($url, $depends = [], $options = [], $key = null) {
    //     parent::registerJsFile($this->addModifyTimeToUrl($url),$depends,$options,$key);
    // }

    public function getLangShort() {
        static $language;

        if (!$language) {
            preg_match('%^([a-z]+)%',Yii::$app->language,$m);
            $language=$m[1];
        }

        return $language;
    }

    public function getLangUrl($language) {
        parse_str(Yii::$app->request->queryString, $params);
        $paramsStr = http_build_query($params);

        return '/' . $language . preg_replace('%^('.implode('|', Yii::$app->translateManager->supportedLanguages).')/%','/',Yii::$app->request->pathInfo) . ($paramsStr != '' ? '?' . $paramsStr : '');
    }

    public function getLangOtherUrl() {
        $url=$this->getLangShort()=='ru' ? '/en':'';
        $url.=Yii::$app->request->url;

        return $url;
    }

    public function getLangENUrl() {
        $url='/en';
        $url.=Yii::$app->request->url;
        return $url;
    }

    public function getLangOtherName() {
        return $this->getLangShort()=='ru' ? 'RU':'EN';
    }

    public function addOgMetaTags($title,$image,$description,$hash='') {
        $image=Yii::$app->request->hostInfo.$image;
        $this->registerMetaTag([
            'property'=>'og:image',
            'content'=>$image
        ]);

        $this->registerMetaTag([
            'property'=>'og:title',
            'content'=>$title
        ]);

        $this->registerMetaTag([
            'property'=>'og:description',
            'content'=>$description
        ]);

        $this->registerMetaTag([
            'property'=>'og:url',
            'content'=>Yii::$app->request->hostInfo.Yii::$app->request->url.($hash!='' ? "#$hash":'')
        ]);

        $this->registerMetaTag([
            'property'=>'fb:app_id',
            'content'=>'544551942400366'
        ]);
    }

    public function getTrField($field) {
        return $field.'_'.Yii::$app->language;
    }

    function getLangItems() {
        $items = [];
        foreach (Yii::$app->translateManager->supportedLanguages as $language) {
            $items[] = ['label' => $language, 'url' => $this->getLangUrl($language), 'active' => $language === Yii::$app->language];
        }
        return $items;
    }
}