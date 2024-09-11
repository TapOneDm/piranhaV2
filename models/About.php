<?php

namespace app\models;

use Yii;
use yii\base\Model;

class About extends Model {

    public static function getIndicatorsItems()
    {
        return [
            [
                'title' => Yii::t('app', '600+'),
                'text' => Yii::t('app', 'учеников'),
            ],
            [
                'title' => Yii::t('app', '7+'),
                'text' => Yii::t('app', 'лет работы'),
            ],
            [
                'title' => Yii::t('app', '150+'),
                'text' => Yii::t('app', 'международных спортивных рекордов'),
            ],
            [
                'title' => Yii::t('app', '95%'),
                'text' => Yii::t('app', 'клиентов остаются с нами после пробной тренировки'),
            ],
            [
                'title' => Yii::t('app', '1500+'),
                'text' => Yii::t('app', 'часов повышения квалификации тренерского состава'),
            ],
            [
                'title' => Yii::t('app', '8 человек'),
                'text' => Yii::t('app', 'максимальное число учеников в группе'),
            ],
            [
                'title' => Yii::t('app', '80%'),
                'text' => Yii::t('app', 'учеников школы становятся продвинутыми спортсменами и участвуют в соревнованиях'),
            ],
        ];
    }
}
