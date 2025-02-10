<div class="modal modal-feedback">
    <div class="modal-content">
        <i data-modal-close="modal-feedback" data-sign="true" class="icon-times modal-close"></i>
        <div class="modal-title"><?= Yii::t('app', 'Остались вопросы?') ?></div>
        <div class="modal-body">
            <div class="feedback-intro">
                <p><?= Yii::t('app', 'Мы с радостью ответим') ?></p>
                <p><?= Yii::t('app', 'Напиши нам') ?>:</p>
                <div class="feedback-links">
                    <a target="_blank" href="https://t.me/piranhageoswim"><i class="icon-telegram-plane"></i></a>
                    <a target="_blank" href="https://wa.me/995599079930"><i class="icon-whatsapp"></i></a>
                </div>
                <p><?= Yii::t('app', 'Или здесь и мы свяжемся с тобой') ?></p>
            </div>
            <?= $this->render('_feedback-form') ?>
        </div>
        <div class="modal-actions">
            <button onclick="$('#feedback-form').yiiActiveForm('submitForm');" type="submit" class="primary"><?= Yii::t('app', 'Отправить') ?></button>
        </div>
    </div>
</div>