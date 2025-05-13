<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' => 'en',
    'sourceLanguage' => 'en-US',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['assetsAutoCompress'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Cy1F2UZSs8S6XESQwPuSoyxu59-bIFJv',
            'baseUrl'=> '',
        ],
        'helper' => [
            'class' => 'app\components\Helper',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/login']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'airani\log\TelegramTarget',
                    'levels' => ['error'],
                    'except' => ['yii\web\HttpException:404'],
                    'botToken' => '7743390683:AAEFFIvtWqsjQm7kyMdrGG7xs92GGryNXyY', // bot token secret key
                    'chatId' => '-4572433034', // chat id or channel username with @ like 12345 or @channel
                ],
            ],
        ],
        'db' => $db,
        'translateManager' => [
            'class' => 'app\components\TranslateManager',
            'supportedLanguages' => ['en', 'ge', 'ru'],
            'cacheDuration' => 0
        ],
        'view' => [
            'class' => '\app\components\View'
        ],
        'assetManager'=> [
            'class'=>'app\components\AssetManager',
            'appendTimestamp' => true,
            'converter'=>[
                'class'=> 'nizsheanez\assetConverter\Converter',
                'force'=> false,
                'destinationDir' => '../assets/compiled',
                'parsers' => [
                    'scss' => [
                        'class' => 'nizsheanez\assetConverter\Scss',
                        'options' => [
                            'enableCompass' => true,
                            'lineComments' => false,
                            'outputStyle' => 'compressed'
                        ],
                    ],
                ]
            ]
        ],
        'assetsAutoCompress' => [
            'class' => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            'enabled' => true,
            // 'cssFileBottom'         => true,       //Moving down the page css files
            'cssFileBottomLoadOnJs' => true,
        ],
        'urlManager' => [
            'class'=>'\app\components\UrlManager',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                '/adults' => 'site/adults',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '6529055067:AAGT824FS1E3nxVHT9EEQw1HbBvovNaGv9E'
        ],
    ],
    'params' => $params,
];

// if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
// }

return $config;
