<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/**
* @var $result
*/

$model = new app\models\Feedback();

?>

<?php Pjax::begin(['id' => 'pjax-feedback-form', 'enablePushState' => false]); ?>
    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true],
        'id' => 'feedback-form',
        'action' => 'site/feedback',
        'enableClientValidation' => true,
    ]) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')])->label(false); ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => '4', 'placeholder' => $model->getAttributeLabel('comment')])->label(false); ?>

    <?php ActiveForm::end() ?>

<?php Pjax::end(); ?>