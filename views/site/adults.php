<?php

$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app', 'Плавание в нашей школе помогает не только укрепить тело, но и обрести новые социальные связи, улучшить психоэмоциональное состояние и почувствовать себя лучше во всех аспектах жизни.')
]);

$this->title = Yii::t('app', 'Школа плавания для взрослых - Piranha');
?>

<div class="fixed-buttons">
    <div class="sign-up-button">
        <button data-modal-open data-modal="modal-sign" type="button"><i class="icon-pencil-alt"></i><span><?= Yii::t('app', 'Записаться на первое занятие') ?></span></button>
    </div>
    <div class="feedback-button">
        <button data-modal-open data-modal="modal-feedback" type="button"><span><?= Yii::t('app', 'Задать вопрос') ?></span>?</button>
    </div>
</div>

<div id="intro" class="page intro">
    <div class="intro-slider">
        <div class="intro-slider-items">
            <div class="intro-slider-item"><img src="/static/img/adult/4.jpg" alt=""></div>
        </div>
    </div>
    <div class="container">
        <h1 class="intro-title"><?= Yii::t('app', 'Плавание в нашей школе помогает не только укрепить тело, но и обрести новые социальные связи, улучшить психоэмоциональное состояние и почувствовать себя лучше во всех аспектах жизни.') ?></h1>
        <div class="intro-actions">
            <button data-modal-open data-modal="modal-sign" type="button" class="btn active"><?= Yii::t('app', 'Записаться на пробное занятие') ?></button>
        </div>
        <div class="intro-instagram"><a href="<?= Yii::$app->language == 'ru' ? 'https://www.instagram.com/piranha.ge?igsh=MXN3bnRla2Z5YzNnMg==' : 'https://www.instagram.com/piranhageo/?igsh=OXFzdXR1NnJsZzU3' ?>" target="_blank"><i class="icon-instagram"></i></a></div>
    </div>
</div>
<img class="wave" src="/static/img/wave_intro.svg" alt="wave">

<div class="page">
    <div class="container">
        <div class="page-caption">
            <h2 class="caption-text"><?= Yii::t('app', 'Обучаем плаванию с нуля и готовим к международным заплывам!') ?></h2>
            <button class="caption-button"><?= Yii::t('app', 'Тренировки  для взрослых') ?></button>
        </div>
        <div class="page-content">
            <div class="adult-items">
                <?php foreach ($adultItems as $idx => $item) { ?>
                    <div class="adult-item <?= $idx % 2 != 0 ? 'reversed' : '' ?>">
                        <div class="adult-item-img"><img src="<?= $item['img'] ?>" alt="<?= $item['title'] ?>"></div>
                        <div class="adult-item-text"><?= $item['text'] ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="adults-signup">
            <button data-modal-open data-modal="modal-sign" type="button" class="btn active"><?= Yii::t('app', 'Записаться') ?></button>
        </div>
    </div>
</div>