<?php

namespace app\components;

use Yii;


class UrlManager extends \yii\web\UrlManager
{
    private function getLangShort()
    {
        preg_match('%^([a-z]+)%', Yii::$app->language, $m);
        return $m[1];
    }
    public function createUrl($params)
    {
        $url = parent::createUrl($params);
        if (!preg_match('%^(admin|gii|debug)/%', $params[0])) {
            $url = '/' . $this->getLangShort() . $url;
        }

        return $url;
    }

    public function addLangPrefix($url)
    {
        return '/' . $this->getLangShort() . $url;
    }
    public function parseRequest($request)
    {
        $request = clone $request;
        $request->setPathInfo(preg_replace('%^(' . implode('|', Yii::$app->translateManager->supportedLanguages) . ')/%', '/', $request->pathInfo));
        $res = parent::parseRequest($request);
        return $res;
    }
}
