<?php

namespace app\components;

use Yii;
use yii\helpers\Url;


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

    public function getLangUrl($language) {
        parse_str(Yii::$app->request->queryString, $params);
        $paramsStr = http_build_query($params);

        return '/' . $language . preg_replace('%^('.implode('|', Yii::$app->translateManager->supportedLanguages).')/%','/',Yii::$app->request->pathInfo) . ($paramsStr != '' ? '?' . $paramsStr : '');
    }

    public function initMetaTags()
    {
        $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
        $this->registerMetaTag(['property' => 'og:site_name', 'content' => Yii::t('app', 'Piranha Swimming School')]);

        $this->registerMetaTag(['property' => 'og:url', 'content' => Url::canonical()]);
        $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
        $this->registerMetaTag(['property' => 'og:locale', 'content' => Yii::$app->language]);

        if (empty($this->metaTags['og:image'])) {
            $this->registerMetaTag(['property' => 'og:image', 'content' => Url::to('/static/img/og-image.png', true)]);
        }

        if (empty($this->metaTags['og:description']) && !empty($this->metaTags['description'])) {
            $description = preg_replace('/<.*content=\"(.*)\">/', '$1', $this->metaTags['description']);
            $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);
        }

        /*$this->registerMetaTag(['name' => 'twitter:card', 'content' => 'summary_large_image']);
        $this->registerMetaTag(['name' => 'twitter:site', 'content' => '']);
        $this->registerMetaTag(['name' => 'twitter:title', 'content' => '']);
        $this->registerMetaTag(['name' => 'twitter:description', 'content' => '']);
        $this->registerMetaTag(['name' => 'twitter:image', 'content' => '']);*/
    }

    public function registerMetaTag($options, $key = null)
    {
        $key = $options['name'] ?? $options['property'] ?? null;
        parent::registerMetaTag($options, $key);
    }
}