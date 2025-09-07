<?php

namespace app\components;

use Yii;
use yii\base\Component;

class Survey extends Component {

    private $_survey;

    public function init() {
        $session = Yii::$app->session;
        $survey = new \app\models\Survey();

        if ($session->has('survey')) {
            $survey->setAttributes($session->get('survey'), false);
        }

        $this->setSurvey($survey);
    }

    private function updateChanges() {
        $this->_survey = $this->getSurvey();
        Yii::$app->session->set('survey', $this->_survey->attributes);
    }

    private function setSurvey($survey) {
        $this->_survey = $survey;
        $this->updateChanges();
    }

    public function getSurvey() {
        return $this->_survey;
    }

    public function updateSurvey($survey) {
        $this->setSurvey($survey);
    }

    public function clean(){
        Yii::$app->session->remove('survey');
    }

    public function isEmpty(){
        return !Yii::$app->session->has('survey');
    }

    public function getFilledQuestions()
    {
        $survey = $this->getSurvey();

        if ($survey->scenario == 'default') {
            return false;
        }

        $attrs = $survey->toArray();
        return array_filter($attrs);

    }

    public function getCurrentStep()
    {
        $survey = $this->getSurvey();
        return str_replace('q', '', $survey->scenario);
    }

}
