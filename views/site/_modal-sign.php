<div class="modal modal-sign">
    <div class="modal-content">
        <i data-modal-close="modal-sign" data-sign="true" class="icon-times modal-close"></i>
        <div class="modal-title"><?= Yii::t('app', 'Записаться') ?></div>
        <div class="modal-body">
            <?= $this->render('_sign-form') ?>
            <div style="text-align: center; margin-top: 30px;" class="feedback-intro">
                <p><?= Yii::t('app', 'Мы с радостью ответим') ?></p>
                <p><?= Yii::t('app', 'Напиши нам') ?>:</p>
                <div class="feedback-links">
                    <a target="_blank" href="https://t.me/piranhageoswim"><i class="icon-telegram-plane"></i></a>
                    <a target="_blank" href="https://wa.me/995599079930"><i class="icon-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="modal-actions">
            <button onclick="$('#sign-form').yiiActiveForm('submitForm');" type="submit" class="primary"><?= Yii::t('app', 'Записаться') ?></button>
        </div>
    </div>
</div>