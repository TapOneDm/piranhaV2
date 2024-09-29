<div class="modal modal-benefit">
    <div class="modal-content">
        <i data-modal-close="modal-benefit" data-benefit="true" class="icon-times modal-close"></i>

        <div class="modal-title"><?= Yii::t('app', 'Предложение') ?></div>
        <div class="modal-body"><?= Yii::t('app', 'Записаться на первое занятие со скидкой 50%') ?></div>
        <div class="modal-actions">
            <button data-modal-open data-benefit="true" data-modal="modal-sign" class="primary" type="button"><?= Yii::t('app', 'Записаться') ?></button>
            <button data-modal-close="modal-benefit" data-benefit="true" type="button"><?= Yii::t('app', 'Закрыть') ?></button>
        </div>
    </div> 
</div>