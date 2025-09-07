<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\SurveyAsset;
use yii\widgets\Pjax;

SurveyAsset::register($this);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->title = Yii::t('app', 'Тест');

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            <title><?= Html::encode($this->title ?? Yii::t('app', 'Тест')) ?></title>
            <?= $this->render('_favicon') ?>
            <meta name="msapplication-TileColor" content="#E3007B">
            <meta name="theme-color" content="#E3007B">    
            <meta charset="utf-8">
            <?= $this->initMetaTags() ?>
            <?php $this->head() ?>
        </head>
        <body>
            <?php $this->beginBody() ?>
                <div class="wrapper">
                    <div class="container">
                        <?php Pjax::begin(['id' => 'pjax-survey', 'enablePushState' => false]); ?>
                            <?php
                                $answered = Yii::$app->survey->getFilledQuestions();
                            ?>
                            <?php if ($answered !== false) { ?>
                                <div class="progress"></div>
                            <?php } ?>
                            <?= $content ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage() ?>
