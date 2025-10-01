<?php

use yii\helpers\Url;

/** @var $data
*   @var $model \app\models\Survey
*/

$imageSrc =  $data['image'][intval($model->question0) - 1];
?>

<style>
    .progress {
        display: none;
    }
</style>

<div
    class="spage"
    data-share-img="https://piranha.ge<?= $imageSrc ?>"
    data-share-title="<?= $data['title'] ?>"
    data-share-text="<?= $data['text'] ?>"
>
    <div class="spage-header">
        <h1><?= $data['title'] ?></h1>
    </div>
    <div class="spage content">
        <img src="<?= $imageSrc ?>" alt="<?= $data['title'] ?>">
        <div><?= $data['text'] ?></div>

        <div class="result-share">
            <a href="https://www.instagram.com/piranha.ge/?igsh=MXN3bnRla2Z5YzNnMg%3D%3D#"><?= Yii::t('app', 'Записаться со скидкой') ?></a>
            <div class="result-share-other">
                <button class="share" data-messenger="telegram"><?= Yii::t('app', 'Поделиться в Telegram') ?></button>
                <button class="share" data-messenger="whatsapp"><?= Yii::t('app', 'Поделиться в WhatsApp') ?></button>
            </div>
        </div>
    </div>
</div>

<script>
    function generateTelegramShareLink(imageUrl, title, text) {
        const surveyLink = '';
        const fullText = encodeURIComponent(title + "\n\n" + imageUrl + "\n\n" + text);
        const shareUrl = `https://telegram.me/share/url?text=${fullText}`;
        return shareUrl;
    }

    $(document).on('click', 'button.share', function(e) {
        e.preventDefault();

        const spage = $('.spage');
        const fullImageUrl = spage.data('share-img');
        const title = spage.data('share-title');
        const text = spage.data('share-text');

        let targetLinkBtn = $(e.target).data('messenger');

        if (targetLinkBtn === 'telegram') {
            let shareUrl = generateTelegramShareLink(fullImageUrl, title, text);
            window.open(shareUrl, '_blank');
        }
    })
</script>