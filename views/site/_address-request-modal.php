<div class="modal modal-address-request">
    <div class="modal-content">
        <i data-modal-close="modal-address-request" data-sign="true" class="icon-times modal-close"></i>
        <div class="modal-title"><?= Yii::t('app', 'Хочу заниматься здесь') ?></div>
        <div class="modal-body">
            <?= $this->render('_address-request-form') ?>
        </div>
        <div class="modal-actions">
            <button onclick="$('#address-request-form').yiiActiveForm('submitForm');" type="submit" class="primary"><?= Yii::t('app', 'Отправить') ?></button>
        </div>
    </div>
</div>