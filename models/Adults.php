<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Adults extends Model {
    public static function getItems() {
        return [
            [
                'title' => Yii::t('app', 'Чувствуете себя одиноко в новом городе?'),
                'img' => '/static/img/adult/1.jpg',
                'text' => Yii::t('app', 'Для многих экспатов плавание становится не только возможностью поддержать физическую форму, но и найти новых друзей и единомышленников. Наши тренировки создают идеальные условия для общения и восстановления социальных связей.'),
            ],
            [
                'title' => Yii::t('app', 'Боли в спине и головные боли после долгого рабочего дня?'),
                'img' => '/static/img/adult/2.jpg',
                'text' => Yii::t('app', 'Работа в сфере IT и других удаленных профессиях может сильно повлиять на ваше здоровье. Плавание помогает разгрузить позвоночник, улучшить осанку и снять мышечное напряжение. Многие наши ученики заметили значительное улучшение после нескольких недель занятий.'),
            ],
            [
                'title' => Yii::t('app', 'Обучаем плаванию с нуля и готовим к международным заплывам!'),
                'img' => '/static/img/adult/3.jpg',
                'text' => Yii::t('app', 'Мы обучаем всех четырем стилям плавания: кроль, брасс, баттерфляй и на спине. Также подготавливаем к международным заплывам. Вы сможете улучшить здоровье, подготовиться к соревнованиям или просто насладиться тренировками.'),
            ],
            [
                'title' => Yii::t('app', 'Улучшение дыхательной системы и восстановление после болезней'),
                'img' => '/static/img/adult/5.jpg',
                'text' => Yii::t('app', 'Регулярные занятия плаванием увеличивают объем легких, что улучшает общее самочувствие и работу организма. Это особенно важно для людей, перенесших COVID-19, так как даже при отсутствии сильного поражения легких многие испытывают последствия болезни. Мы предлагаем программы реабилитации и тренировки, которые поддержат ваше здоровье.'),
            ],
            [
                'title' => Yii::t('app', 'Индивидуальные программы для людей с проблемами опорно-двигательного аппарата'),
                'img' => '/static/img/adult/6.jpg',
                'text' => Yii::t('app', 'Мы разрабатываем специальные программы для тех, у кого есть проблемы с позвоночником и суставами. Наши тренеры внимательно следят за прогрессом и адаптируют упражнения так, чтобы не усугублять, а улучшать состояние здоровья.'),
            ],
            [
                'title' => Yii::t('app', 'Обретите новых друзей или найдите спокойствие в воде'),
                'img' => '/static/img/adult/7.jpg',
                'text' => Yii::t('app', 'Плавание – это возможность не только обрести новых друзей, но и открыть для себя новые ощущения. Вода помогает интровертам почувствовать себя более уверенно и стабильно, а также улучшает качество жизни за счет восстановления внутреннего баланса.'),
            ],
            [
                'title' => Yii::t('app', 'Тарифы для занятий в группе или с партнером'),
                'img' => '/static/img/adult/8.jpg',
                'text' => Yii::t('app', 'У нас есть различные тарифы для групповых занятий, а также для тех, кто хочет тренироваться вместе с партнером, женой, мужем или другом. Если ваш ребенок уже занимается у нас, это двойная мотивация присоединиться к тренировкам!'),
            ],
            [
                'title' => Yii::t('app', 'Плавание для психоэмоциональной устойчивости'),
                'img' => '/static/img/adult/4.jpg',
                'text' => Yii::t('app', 'Плавание помогает снизить стресс и уровень тревожности. Многие отмечают улучшение качества сна, уменьшение зависимости от антидепрессантов и общий подъем настроения. Вода способствует перезагрузке организма, улучшая нейронные связи и работоспособность мозга.'),
            ],
        ];
    }
}