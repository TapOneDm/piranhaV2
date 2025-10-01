<?php

namespace app\controllers\survey;

use Yii;
use app\controllers\base\BaseController;

class SiteController extends BaseController
{
    public $layout = '@app/views/survey/layouts/main';

    public function actionIndex()
    {
        if (
            !isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) ||
            $_SERVER['PHP_AUTH_USER'] !== 'admin' ||
            $_SERVER['PHP_AUTH_PW'] !== 'admin'
        ) {
            header('WWW-Authenticate: Basic realm="Please enter your credentials"');
            header('HTTP/1.0 401 Unauthorized');
            exit;
        }

        $isPost = Yii::$app->request->isPost;
        
        if (!$isPost) {
            Yii::$app->survey->clean();
        }

        $model = Yii::$app->survey->getSurvey();
        $model->setAttributes(array_fill_keys($model->attributes(), null));

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step0');
        }

        return $this->render('index', ['model' => $model]);
    }

    public function actionStep0()
    {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q0');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step1');
        }

		return $this->render('step0');
    }

    public function actionStep1() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q1');
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step2');
        }

		return $this->render('step1');
	}

    public function actionStep2() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q2');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step3');
        }

		return $this->render('step2');
	}

    public function actionStep3() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q3');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step4');
        }

		return $this->render('step3');
	}

    public function actionStep4() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q4');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step5');
        }

		return $this->render('step4');
	}

    public function actionStep5() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q5');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step6');
        }

		return $this->render('step5');
	}

    public function actionStep6() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q6');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step7');
        }

		return $this->render('step6');
	}

    public function actionStep7() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q7');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('step8');
        }

		return $this->render('step7');
	}

    public function actionStep8() {
        $model = Yii::$app->survey->getSurvey();
        $model->setScenario('q8');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->survey->updateSurvey($model);
            return $this->render('result', ['data' => $model->getResultData(), 'model' => $model]);
        }

		return $this->render('step8');
	}

    public function actionResult() {
        Yii::$app->survey->clean();
        return $this->render('result');
    }
}
