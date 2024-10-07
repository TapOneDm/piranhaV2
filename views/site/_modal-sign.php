<div class="modal modal-sign">
    <div class="modal-content">
        <i data-modal-close="modal-sign" data-sign="true" class="icon-times modal-close"></i>
        <div class="modal-title"><?= Yii::t('app', 'Записаться') ?></div>
        <div class="modal-body">
            <?= $this->render('_sign-form') ?>
        </div>
        <div class="modal-actions">
            <button onclick="$('#sign-form').yiiActiveForm('submitForm');" type="submit" class="primary"><?= Yii::t('app', 'Записаться') ?></button>
        </div>
    </div>
</div>