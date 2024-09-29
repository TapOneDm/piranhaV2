<?php

namespace app\controllers;

use app\controllers\base\BaseController;
use app\models\Sign;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SiteController extends BaseController
{
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
        $model = new Sign();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate() && $model->save()) {
                // $model->sendTelegramMessage();
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
}
