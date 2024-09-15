<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/**
* @var $result
*/

$model = new app\models\Sign();
?>

<?php Pjax::begin(['id' => 'pjax-sign-form', 'enablePushState' => false]); ?>
    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true],
        'id' => 'sign-form',
        'action' => 'site/sign',
        'enableClientValidation' => true,
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')])->label(false); ?>
    <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')])->label(false); ?>
    <?= $form->field($model, 'train_type')->radioList($model->getTrainTypeList())->label(true) ?>

    <?php ActiveForm::end() ?>
    
    <?php if (isset($result)) { ?>
        <?php if (!empty($result)) { ?>
            <div class="send-success"><?= Yii::t('app', 'Отправлено успешно!') ?></div>
        <?php } else { ?>
            <div class="send-error"><?= Yii::t('app', 'Что-то пошло не так, попробуйте еще раз') ?></div>
        <?php }?>
    <?php } ?> 

<?php Pjax::end(); ?>