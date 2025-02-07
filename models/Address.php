<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Address extends Model {

    public static function getItems()
    {
        return [
            [
                'disabled' => false,
                'imageSrc' => '/static/img/address/sport_time.jpg',                
                'title' => Yii::t('app', 'SPORT TIME'),
                'text' => Yii::t('app', 'Бассейн в районе Ортачала'),
                'coords_google' => 'https://maps.app.goo.gl/AGx48HygxHy2dMns5?g_st=com.google.maps.preview.copy',
                'coords_yandex' => 'https://yandex.by/maps/org/vremya_sporta/145398686236/?ll=44.826427%2C41.674429&z=17',
            ],
            [
                'disabled' => false,
                'imageSrc' => '/static/img/address/prime_fit.jpg',                
                'title' => Yii::t('app', 'PRIME FIT'),
                'text' => Yii::t('app', 'Бассейн в районе Сабуртало'),
                'coords_google' => 'https://maps.app.goo.gl/h2mYEjx9QaXHAJ2h9?g_st=com.google.maps.preview.copy',
                'coords_yandex' => 'https://yandex.by/maps/org/prime_fit/104225704357/?ll=44.730388%2C41.724465&z=17',
            ],
            // [
            //     'imageSrc' => '/static/img/address/school.jpg',                
            //     'title' => Yii::t('app', 'БАССЕЙН ШКОЛЫ №35'),
            //     'text' => Yii::t('app', 'Бассейн в районе Сабуртало'),
            //     'coords' => 'https://yandex.by/maps/10277/tbilisi/?ll=44.723902%2C41.721033&mode=whatshere&whatshere%5Bpoint%5D=44.724503%2C41.721386&whatshere%5Bzoom%5D=18&z=17'
            // ],
            [
                'disabled' => false,
                'imageSrc' => '/static/img/address/wyndxam.jpg',                
                'title' => Yii::t('app', 'WYNDXAM'),
                'text' => Yii::t('app', 'Бассейн на Площади Свободы'),
                'coords_google' => 'https://maps.app.goo.gl/AVuXXwZxXnKvxbue6',
                'coords_yandex' => 'https://yandex.com.ge/maps/-/CHeTiENf',
            ],
            [
                'disabled' => false,
                'imageSrc' => '/static/img/address/olimp.jpg',                
                'title' => Yii::t('app', 'Olimp'),
                'text' => Yii::t('app', 'Басейн в Сабуртало'),
                'coords_google' => 'https://maps.app.goo.gl/7BCYVuhFVuiEGzUw6',
                'coords_yandex' => 'https://yandex.com.ge/maps/-/CHeTi44v',
            ],
            [
                'disabled' => true,
                'imageSrc' => '/static/img/address/lisi.jpg',
                'title' => '',
                'text' => Yii::t('app', 'Бассейн на Лиси'),
                'coords_google' => '',
                'coords_yandex' => '',
            ],
            [
                'disabled' => true,
                'imageSrc' => '/static/img/address/temka.jpg',
                'title' => '',
                'text' => Yii::t('app', 'Бассейн в Темка'),
                'coords_google' => '',
                'coords_yandex' => '',
            ],
            [
                'disabled' => true,
                'imageSrc' => '/static/img/address/isani.jpg',
                'title' => '',
                'text' => Yii::t('app', 'Бассейн в Исани'),
                'coords_google' => '',
                'coords_yandex' => '',
            ],
            [
                'disabled' => true,
                'imageSrc' => '/static/img/address/mtacmidna.jpg',
                'title' => '',
                'text' => Yii::t('app', 'Бассейн на Мтацминда'),
                'coords_google' => '',
                'coords_yandex' => '',
            ],
        ];
    }
}
