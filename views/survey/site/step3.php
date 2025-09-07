<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$model = Yii::$app->survey->getSurvey();

?>
<div class="step-legend" data-step="3">Вопрос 3 / 8</div>
<?php $form = ActiveForm::begin([
    'options' => ['data-pjax' => true],
    'action' => '/survey/step3',
]); ?>
    <div class="spage">
        <div class="spage-content">
            <?= $form->field($model, 'question3')->radioList(
                \app\models\Survey::getAnswerList()['question3'],
                [
                    'class' => 'survey-answers'
                ]); ?>
        </div>
        <div class="spage-footer">
            <div class="actions">
                <?= Html::a(Yii::t('app', 'Назад'), Url::to(['survey/site/step2']), ['class' => 'btn outline'])?>
                <?= Html::submitButton('Дальше', ['class' => 'btn', 'disabled' => !isset($model->question3)]) ?>
            </div>
        </div>
    </div>
    

<?php ActiveForm::end(); ?>

<script>
    $(document).ready(function() {
        $('input[type=radio]:checked').each(function() {
            $(this).closest('label').addClass('selected');
        });
    });
    $(document).on('change', 'input[type=radio][name="Survey[question3]"]', function() {
    $('label').removeClass('selected');
    $(this).closest('label').addClass('selected');
    $('button[type="submit"]').attr('disabled', false);
});
</script>