<div class="modal modal-sign">
    <div class="modal-content">
        <div class="modal-title"><?= Yii::t('app', 'Записаться') ?></div>
        <div class="modal-body">
            <?= $this->render('_sign-form') ?>
        </div>
        <div class="modal-actions">
            <button onclick="$('#sign-form').yiiActiveForm('submitForm');" type="submit"><?= Yii::t('app', 'Записаться') ?></button>
            <button onclick="$('#sign-form')[0].reset()" data-modal-close type="button"><?= Yii::t('app', 'Закрыть') ?></button>
        </div>
    </div>
</div>