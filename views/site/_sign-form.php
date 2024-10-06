<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/**
* @var $result
*/

$model = new app\models\Sign();
$priceItems = \app\models\Price::getItems();

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
    <?= $form->field($model, 'train_type')->radioList($model->getTrainTypeList())->label(false) ?>

    <?php ActiveForm::end() ?>

    <div class="sign-description">
        <?php foreach($priceItems as $priceItem) { ?>
            <ul class="<?= $priceItem['check'] ?>">
                <?php foreach ($priceItem['points'] as $point) { ?>
                    <li><?= Html::encode($point) ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>

<?php Pjax::end(); ?>