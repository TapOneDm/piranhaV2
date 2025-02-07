<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/**
* @var $result
*/

$model = new app\models\AddressRequest();
$priceItems = \app\models\Price::getItems();

?>

<?php Pjax::begin(['id' => 'pjax-address-request-form', 'enablePushState' => false]); ?>
    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true],
        'id' => 'address-request-form',
        'action' => 'site/address-request',
        'enableClientValidation' => true,
    ]) ?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')])->label(false); ?>
    <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')])->label(false); ?>
    <?= $form->field($model, 'address')->hiddenInput()->label(false); ?>
    <?php ActiveForm::end() ?>
<?php Pjax::end(); ?>