<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$model = Yii::$app->survey->getSurvey();

?>

<!-- <div class="step-legend" data-step="0">Вопрос 1 / 8</div> -->
<?php $form = ActiveForm::begin([
    'options' => ['data-pjax' => true],
    'action' => '/survey/step0',
]); ?>
    <div class="spage">
        <div class="spage-content">
            <?= $form->field($model, 'question0')->radioList(
                \app\models\Survey::getAnswerList()['question0'],
                [
                    'class' => 'survey-answers'
                ]); ?>
        </div>
        <div class="spage-footer">
            <div class="actions">
                <?= Html::a(Yii::t('app', 'Назад'), Url::to(['survey/site/index']), ['class' => 'btn outline'])?>
                <?= Html::submitButton('Дальше', ['class' => 'btn', 'disabled' => !isset($model->question0)]) ?>
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
    $(document).on('change', 'input[type=radio][name="Survey[question0]"]', function() {
        $('label').removeClass('selected');
        $(this).closest('label').addClass('selected');
        $('button[type="submit"]').attr('disabled', false);
    });
</script>