<?php

namespace app\controllers;

use app\controllers\base\BaseController;
use app\models\Sign;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SiteController extends BaseController
{
    const GUEST_PLACE_CLUB = 'club';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $cookies = Yii::$app->response->cookies;
        $queryParams = Yii::$app->request->getQueryParams();

        if (!empty($queryParams['utm_source'])) {
            $cookies->add(new \yii\web\Cookie([
                'name' => 'utm_source',
                'value' => $queryParams['utm_source'],
                'expire' => time() + 60 * 60 * 24 * 1,
            ]));
        }
        return $this->render('index');
    }

    public function actionRules()
    {
        return $this->render('rules');
    }

    public function actionGallery()
    {
        return $this->render('gallery');
    }

    public function actionSign()
    {
        $queryParams = Yii::$app->request->getQueryParams();
        $source = $queryParams['utm_source'] ?? null;

        if (empty($source)) {
            $cookies = Yii::$app->request->cookies;
            $source = $cookies->getValue('utm_source', null);
        }

        $model = new Sign();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->source = $source;

            if ($model->validate() && $model->save()) {
                $model->sendTelegramMessage();
                $model->sendWhatsAppMessage();
                $model = new Sign();
                $this->renderPartial('_sign-form'); 
            }
            return $this->renderPartial('_sign-form');
        }
        return $this->renderPartial('_sign-form');
    }

    public function actionGalleryList()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            return ['html' => $this->renderPartial('_gallery')];
        }
    }

    public function actionError()
    {
        return $this->render('error');
    }

    public function actionBot()
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://gate.whapi.cloud/messages/text', [
                'body' => json_encode([
                    'to' => '375299063859', // The recipient's WhatsApp number in international format
                    'body' => 'Hello world from NEGR!' // The text message to send
                ]),
                'headers' => [
                    'accept' => 'application/json', // Specify that we expect a JSON response
                    'authorization' => 'Bearer zC9GfGFyxh1Af6BrT0YEaV4AGQiCgrkR', // Replace YOUR_TOKEN_HERE with your API token
                    'content-type' => 'application/json', // Send data in JSON format
                ],
            ]);

            echo "Message sent successfully: " . $response->getBody();

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle any errors during the request
            echo 'Error: ' . $e->getMessage();
        }
    }

}
