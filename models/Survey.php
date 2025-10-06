<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Survey extends Model {
    const TAG_TECH = 'tech';
    const TAG_DIPLOMACY = 'diplomacy';
    const TAG_SPORTS = 'sports';
    const TAG_CREATIVE = 'creative';
    const TAG_BUSINESS = 'business';
    const TAG_ADVENTURE = 'adventure';
    const TAG_ANALYSIS = 'analysis';
    
    public $question0;
    public $question1;
    public $question2;
    public $question3;
    public $question4;
    public $question5;
    public $question6;
    public $question7;
    public $question8;

    public function rules()
    {
        return [
            ['start', 'safe'],
            [
                [
                    'question0',
                    'question1',
                    'question2',
                    'question3',
                    'question4',
                    'question5',
                    'question6',
                    'question7',
                    'question8',
                ],
                'integer',
            ],
            ['question0', 'required', 'on'=>'q0'],
            ['question1', 'required', 'on'=>'q1'],
            ['question2', 'required', 'on'=>'q2'],
            ['question3', 'required', 'on'=>'q3'],
            ['question4', 'required', 'on'=>'q4'],
            ['question5', 'required', 'on'=>'q5'],
            ['question6', 'required', 'on'=>'q6'],
            ['question7', 'required', 'on'=>'q7'],
            ['question8', 'required', 'on'=>'q8'],
        ];
    }

    public function attributeLabels() {
        return [
            'question0' => Yii::t('app', 'Ваш ребенок'),
            'question1' => Yii::t('app', 'Как ваш ребёнок чаще всего ведёт себя на площадке?'),
            'question2' => Yii::t('app', 'А что дома увлекает вашего ребёнка больше всего?'),
            'question3' => Yii::t('app', 'Как он реагирует на новые ситуации?'),
            'question4' => Yii::t('app', 'Как вы думаете, где его сильная сторона?'),
            'question5' => Yii::t('app', 'Что больше всего утомляет вашего ребёнка?'),
            'question6' => Yii::t('app', 'Как он лучше всего учится?'),
            'question7' => Yii::t('app', 'Если бы ваш ребёнок оказался героем фильма, кем бы он был?'),
            'question8' => Yii::t('app', 'Что для вас важнее всего в активности для ребёнка?'),
        ];
    }

    public function scenarios() {
        return array_merge(parent::scenarios(),[
            'q1' => ['question1'],
            'q2' => ['question2'],
            'q3' => ['question3'],
            'q4' => ['question4'],
            'q5' => ['question5'],
            'q6' => ['question6'],
            'q7' => ['question7'],
            'q8' => ['question8'],
        ]);
    }

    public static function getAnswerList()
    {
        return [
            'question0' => [
                1 => Yii::t('app', 'Мальчик'),
                2 => Yii::t('app', 'Девочка'),
            ],
            'question1' => [
                1 => Yii::t('app', 'Бегает и крутится, не сидит на месте.'),
                2 => Yii::t('app', 'Занимает компанию и заводит друзей.'),
                3 => Yii::t('app', 'Предпочитает наблюдать за другими.'),
                4 => Yii::t('app', 'Увлечён в свой мир игр/фантазий.'),
                5 => Yii::t('app', 'Сидит и собирает конструктор или что-то мастерит.'),
            ], 
            'question2' => [
                1 => Yii::t('app', 'Футбол или активные игры.'),
                2 => Yii::t('app', 'Настольные игры, задачки или эксперименты.'),
                3 => Yii::t('app', 'Рисование и творчество.'),
                4 => Yii::t('app', 'Книги и чтение.'),
                5 => Yii::t('app', 'Компьютерные игры.'),
            ],
            'question3' => [
                1 => Yii::t('app', 'Сразу бежит навстречу приключениям.'),
                2 => Yii::t('app', 'Сначала наблюдает, потом осторожно пробует.'),
                3 => Yii::t('app', 'Начинает организовывать других.'),
                4 => Yii::t('app', 'Вовлекает друзей и знакомых.'),
                5 => Yii::t('app', 'Уходит в себя и придумывает свою версию происходящего.'),
            ],
            'question4' => [
                1 => Yii::t('app', 'Физическая энергия.'),
                2 => Yii::t('app', 'Общение и дружба.'),
                3 => Yii::t('app', 'Умение мыслить стратегически.'),
                4 => Yii::t('app', 'Творчество и фантазия.'),
                5 => Yii::t('app', 'Внимание к деталям.'),
            ],
            'question5' => [
                1 => Yii::t('app', 'Шум и толпа.'),
                2 => Yii::t('app', 'Слишком много информации/гаджетов.'),
                3 => Yii::t('app', 'Адреналин и эмоции.'),
                4 => Yii::t('app', 'Скука и рутина.'),
                5 => Yii::t('app', 'Давление и стресс от решений.'),
            ],
            'question6' => [
                1 => Yii::t('app', 'Через движение и практику.'),
                2 => Yii::t('app', 'Через командную работу.'),
                3 => Yii::t('app', 'Через наблюдение и анализ.'),
                4 => Yii::t('app', 'Через творчество и визуальные образы.'),
                5 => Yii::t('app', 'Через решение задач и планирование.'),
            ],
            'question7' => [
                1 => Yii::t('app', 'Спортсменом-чемпионом.'),
                2 => Yii::t('app', 'Главным дипломатом или премьером.'),
                3 => Yii::t('app', 'Храбрым исследователем.'),
                4 => Yii::t('app', 'Гениальным учёным или предпринимателем.'),
                5 => Yii::t('app', 'Художником или философом.'),
                6 => Yii::t('app', 'Сыщиком, раскрывающим тайны.'),
            ],
            'question8' => [
                1 => Yii::t('app', 'Чтобы тратил энергию и рос здоровым.'),
                2 => Yii::t('app', 'Чтобы заводил друзей.'),
                3 => Yii::t('app', 'Чтобы научился концентрироваться.'),
                4 => Yii::t('app', 'Чтобы развивал творческие способности.'),
                5 => Yii::t('app', 'Чтобы умел справляться со стрессом.'),
            ],
        ];
    }

    public static function getResultDataMap()
    {
        return [
            static::TAG_TECH => [
                'title' => Yii::t('app', 'Будущий Илон Маск'),
                'text' => Yii::t('app', 'Изобретатель по натуре: конструкторы, шахматы, программирование — его вселенная. Скорее всего, у него будет сидячий образ жизни, а это риск для осанки и искривления позвоночника. В Piranha есть специальные методики для работы над осанкой: плавание укрепляет спину, формирует здоровый рост и помогает мозгу работать ещё лучше. Вода также защищает от сенсорного перегруза от гаджетов и информации.'),
                'image' => [
                    '/static/img/survey/boy_tech.jpg',
                    '/static/img/survey/girl_tech.jpg',
                ],
            ],
            static::TAG_DIPLOMACY => [
                'title' => Yii::t('app', 'Будущий министр иностранных дел'),
                'text' => Yii::t('app', 'Дружелюбный дипломат: легко улаживает споры и находит общий язык с кем угодно. Театр, командные игры и публичные выступления — его стихия. Но чтобы костюм сидел идеально, нужна ровная спинка и правильная осанка. А ещё настоящему переговорщику нужно уметь справляться с сенсорной перегрузкой от шума, толпы и общения. Плавание в Piranha укрепляет тело, развивает выносливость и возвращает баланс.'),
                'image' => [
                    '/static/img/survey/boy_diplomacy.jpg',
                    '/static/img/survey/girl_diplomacy.jpg',
                ],
            ],
            static::TAG_SPORTS => [
                'title' => Yii::t('app', 'Новый Квича Кварацхелия'),
                'text' => Yii::t('app', 'Энергичный как вулкан: активные виды спорта — его стихия. Но футбол и другие нагрузки часто связаны с травмами. Чтобы они не помешали развитию спортивной карьеры, важно укреплять организм и делать профилактику. Врачи советуют плавание как лучший способ восстановления. Вода также помогает снять сенсорное перенапряжение от адреналина и эмоций.'),
                'image' => [
                    '/static/img/survey/boy_sport.jpg',
                    '/static/img/survey/girl_sport.jpg',
                ],
            ],
            static::TAG_CREATIVE => [
                'title' => Yii::t('app', 'Пиросмани XXI века'),
                'text' => Yii::t('app', 'Творческая натура: рисует, фантазирует, сочиняет истории. Даже если он не станет писать шедевры на стенах тбилисских домов, осанка и дыхание должны быть правильными. Плавание в Piranha развивает лёгкие, укрепляет спину и улучшает межполушарное взаимодействие: движения в воде помогают творческим детям соединять фантазию с логикой. А вода разгружает зрительное восприятие, снимая перегруз от красок, деталей и ярких образов.'),
                'image' => [
                    '/static/img/survey/boy_creative.jpg', // !!!!
                    '/static/img/survey/boy_creative.jpg', // !!!!
                ],
            ],
            static::TAG_BUSINESS => [
                'title' => Yii::t('app', 'Топ из списка Forbes'),
                'text' => Yii::t('app', 'Маленький стратег и предприниматель от Бога: всё просчитывает, планирует и ищет выгодные ходы. Настолки, головоломки и «мини-бизнесы» — его стихия. Но настоящий талант должен уметь справляться со стрессом. В Piranha плавание помогает сбросить напряжение, укрепить тело и развить выносливость. А вода снимает сенсорный перегруз от постоянных решений и давления, позволяя будущему гению сделок мыслить яснее.'),
                'image' => [
                    '/static/img/survey/boy_business.jpg',
                    '/static/img/survey/girl_business.jpg',
                ],
            ],
            static::TAG_ADVENTURE => [
                'title' => Yii::t('app', 'Новый Индиана Джонс или артист Сухишвили'),
                'text' => Yii::t('app', 'Весёлый искатель приключений: ему подавай новые авантюры и впечатления. Даже если ему не суждено колесить в туре с национальным балетом Грузии, осанка должна быть идеальной. Плавание даёт те же ощущения открытия, но безопаснее и полезнее: укрепляет тело и формирует ровную спину. А ещё вода помогает справляться с сенсорной перегрузкой от бесконечного потока эмоций и впечатлений.'),
                'image' => [
                    '/static/img/survey/boy_adventure.jpg',
                    '/static/img/survey/girl_adventure.jpg',
                ],
            ],
            static::TAG_ANALYSIS => [
                'title' => Yii::t('app', 'Шерлок NextGen'),
                'text' => Yii::t('app', 'Внимательный наблюдатель: замечает то, что другим ускользает, и любит разгадывать загадки. Его сила — в тишине и деталях. Но когда вокруг слишком много шума, событий и информации, наступает сенсорная перегрузка, и даже его R.A.S. (система фильтрации внимания) начинает давать сбои. Плавание в Piranha помогает перезагрузить восприятие, укрепить тело и сохранить остроту ума сыщика нового поколения.'),
                'image' => [
                    '/static/img/survey/boy_analysis.jpg',
                    '/static/img/survey/girl_analysis.jpg',
                ],
            ],
        ];
    }

    public function calculateSumTags()
    {
        $qestionsResultMap = \app\components\Helper::getSurveyQuestionResultMap();
        $modelResult = $this->toArray();
        
        $data = [];
        foreach ($modelResult as $key => $value) {
            $data[$key] = $qestionsResultMap[$key][$value];
        }

        $sums = [];
        foreach ($data as $question) {
            foreach ($question as $tag => $value) {
                if (!isset($sums[$tag])) {
                    $sums[$tag] = 0;
                }
                $sums[$tag] += $value;
            }
        }

        if (empty($sums)) {
            return '';
        }

        $priorityOrder = static::getTagsWithOrder();

        $maxSum = max($sums);

        // Filter tags that share the max sum
        $maxTags = array_filter($sums, fn($sum) => $sum === $maxSum);

         // Sort max tags based on priority order
        usort($priorityOrder, function ($a, $b) use ($maxTags, $priorityOrder) {
            $posA = array_search($a, $priorityOrder);
            $posB = array_search($b, $priorityOrder);
            return $posA <=> $posB;
        });

        foreach ($priorityOrder as $tag) {
            if (isset($maxTags[$tag])) {
                return $tag;
            }
        }

        return key($maxTags);
    }

    public function getResultData()
    {
        $tag = $this->calculateSumTags();

        return static::getResultDataMap()[$tag];
    }

    public static function getTagsWithOrder()
    {
        return [
            static::TAG_TECH,
            static::TAG_DIPLOMACY,
            static::TAG_SPORTS,
            static::TAG_CREATIVE,
            static::TAG_BUSINESS,
            static::TAG_ADVENTURE,
            static::TAG_ANALYSIS,
        ];
    }
}
