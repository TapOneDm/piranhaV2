<?php

/** @var $data */

?>
<style>
    .progress {
        display: none;
    }
</style>

<div class="spage">
    <div class="spage-header">
        <h1><?= $data['title'] ?></h1>
    </div>
    <div class="spage content">
        <img src="<?= $data['image'] ?>" alt="<?= $data['title'] ?>">
        <div><?= $data['text'] ?></div>

        <div class="result-share">
            <a href="https://www.instagram.com/piranha.ge/?igsh=MXN3bnRla2Z5YzNnMg%3D%3D#"><?= Yii::t('app', 'Записаться со скидкой') ?></a>
            <div class="result-share-other">
                <a href="/"><?= Yii::t('app', 'Поделиться в Telegram') ?></a>
                <a href="/"><?= Yii::t('app', 'Поделиться в WhatsApp') ?></a>
            </div>
        </div>
    </div>
</div>