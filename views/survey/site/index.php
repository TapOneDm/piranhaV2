<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'options' => ['data-pjax' => true],
]); ?>

<div class="spage">
    <div class="spage-header">
        <img src="/static/img/logo.svg" alt="logo">
        <h1>Привет, пройди тест!</h1>
    </div>
    <div class="spage-content">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos minus nostrum atque cum tempore error possimus impedit magnam nam, sequi at? Beatae temporibus, error quasi quisquam explicabo magni odit fugiat sit harum laboriosam perspiciatis tempore maxime nemo minima in nobis?</p>
    </div>
    <div class="spage-footer"><?= Html::a(Yii::t('app', 'Начать'), Url::to(['/survey/step0']), ['class' => 'btn'])?></div>
</div>

<?php ActiveForm::end(); ?>
