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
                'coords' => 'https://yandex.by/maps/org/vremya_sporta/145398686236/?ll=44.826427%2C41.674429&z=17'
            ],
            [
                'imageSrc' => '/static/img/address/prime_fit.jpg',                
                'title' => Yii::t('app', 'PRIME FIT'),
                'text' => Yii::t('app', 'Бассейн в районе Сабуртало'),
                'coords' => 'https://yandex.by/maps/org/prime_fit/104225704357/?ll=44.730388%2C41.724465&z=17'
            ],
            [
                'imageSrc' => '/static/img/address/school.jpg',                
                'title' => Yii::t('app', 'БАССЕЙН ШКОЛЫ №35'),
                'text' => Yii::t('app', 'Бассейн в районе Сабуртало'),
                'coords' => 'https://yandex.by/maps/10277/tbilisi/?ll=44.723902%2C41.721033&mode=whatshere&whatshere%5Bpoint%5D=44.724503%2C41.721386&whatshere%5Bzoom%5D=18&z=17'
                // https://yandex.by/maps/org/srednyaya_shkola_35/220595852222/?ll=44.723902%2C41.721033&z=17
            ],
        ];
    }
}
