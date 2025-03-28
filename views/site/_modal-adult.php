<div class="modal modal-adult">
    <div class="modal-content">
        <i data-modal-close="modal-adult" class="icon-times modal-close"></i>
        <div class="modal-title"><?= Yii::t('app', 'Для взрослых') ?></div>
        <div class="modal-body">
            <p>
                <?= Yii::t('app', 'Плавание в нашей школе помогает не только укрепить тело, но и обрести новые социальные связи, улучшить психоэмоциональное состояние и почувствовать себя лучше во всех аспектах жизни.') ?>
            </p>
            <br>
            <div class="adult-items">
                <?php foreach (\app\models\Adults::getItems() as $idx => $adultItem) { ?>
                    <div class="adult-item">
                        <div class="adult-item-title"><?= $adultItem['title'] ?></div>
                        <div class="adult-item-img">
                            <img
                                class="<?= in_array($idx, [4,7]) ? 'position-top' : ''?>"
                                src="<?= $adultItem['img'] ?>"
                                loading="lazy"
                                alt="<?= $adultItem['title'] ?>">
                        </div>
                        <div class="adult-item-img-text"><?= $adultItem['text'] ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="modal-actions">
            <button data-modal-open data-modal="modal-sign" type="button" class="adult-sign"><?= Yii::t('app', 'Записаться') ?></button>
        </div>
    </div>
</div>