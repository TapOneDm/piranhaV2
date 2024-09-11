<?php

namespace app\controllers;

use app\controllers\base\BaseController;
use app\models\Contact;
use app\models\Review;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use Exception;

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

    public function actionContactRequest()
    {
        $model = new Contact();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash(Contact::SUCCESS_SENT_FLASH_NAME, true);
                $model->sendTelegramMessage();
                $model = new Contact();
            }
        }

        return $this->renderAjax('/forms/_contact-form', ['model' => $model]);
    }
}
