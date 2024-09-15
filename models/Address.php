<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Address extends Model {

    public static function getItems()
    {
        return [
            [
                'imageSrc' => '/static/img/address/sport_time.jpg',                
                'title' => Yii::t('app', 'SPORT TIME'),
                'text' => Yii::t('app', 'Бассейн в районе Ортачала'),
                'coords' => 'https://yandex.by/maps/10277/tbilisi/house/YE0YfgVmTUcAQFprfXp2dXhhbQ==/?ll=44.826427%2C41.674429&z=17'
            ],
            [
                'imageSrc' => '/static/img/address/prime_fit.jpg',                
                'title' => Yii::t('app', 'PRIME FIT'),
                'text' => Yii::t('app', 'Бассейн в районе Сабуртало'),
                'coords' => 'https://yandex.by/maps/10277/tbilisi/?indoorLevel=LG&ll=44.730388%2C41.724465&mode=search&sll=44.730682%2C41.724493&text=41.724493%2C44.730682&z=17'
            ],
            [
                'imageSrc' => '/static/img/address/school.jpg',                
                'title' => Yii::t('app', 'БАССЕЙН ШКОЛЫ №35'),
                'text' => Yii::t('app', 'Бассейн в районе Сабуртало'),
                'coords' => 'https://yandex.by/maps/10277/tbilisi/?ll=44.723920%2C41.720992&mode=search&sll=44.724257%2C41.721016&text=41.721016%2C44.724257&z=17'
            ],            [
                'imageSrc' => '/static/img/address/olympic.jpg',                
                'title' => Yii::t('app', 'OLYMPIC'),
                'text' => Yii::t('app', 'Бассейн в районе Исани'),
                'coords' => 'https://yandex.by/maps/10277/tbilisi/?ll=44.835419%2C41.682312&mode=search&sll=44.843687%2C41.674084&text=41.674084%2C44.843687&z=15'
            ],
        ];
    }
}
