<?php

use yii\helpers\Url;

/** @var $data
*   @var $model \app\models\Survey
*/

$imageSrc =  $data['image'][intval($model->question0) - 1];
$lang = Yii::$app->language;
$instagramLink = 'https://www.instagram.com/piranha.ge/?igsh=MXN3bnRla2Z5YzNnMg%3D%3D#';

if ($lang === 'en' || $lang === 'ge') {
    $instagramLink = 'https://www.instagram.com/piranhageo/?igsh=OXFzdXR1NnJsZzU3#';
}
?>

<style>
    .progress {
        display: none;
    }
</style>

<div
    class="spage"
    data-share-survey="<?= Yii::$app->request->hostInfo . '/' . Yii::$app->language . '/survey' ?>"
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
            <a href="<?= $instagramLink ?>" class="btn" target="_blank"><?= Yii::t('app', 'Записаться со скидкой') ?></a>
            <div class="result-share-other">
                <button class="share btn" data-messenger="telegram"><?= Yii::t('app', 'Поделиться в ') ?><i class="icon-telegram-plane"></i></button>
                <button class="share btn" data-messenger="whatsapp"><?= Yii::t('app', 'Поделиться в ') ?><i class="icon-whatsapp"></i></button>
            </div>
        </div>
    </div>
</div>

<script>
    function generateTelegramShareLink(surveyUrl, imageUrl, title, text) {
        const fullText = encodeURIComponent(title + "\n\n" + text + "\n\n" + imageUrl);
        const shareUrl = `https://t.me/share/url?url=${encodeURIComponent(surveyUrl)}&text=${fullText}`;
        return shareUrl;
    }

    function generateWhatsAppShareLink(surveyUrl, imageUrl, title, text) {
        const fullText = encodeURIComponent(surveyUrl + "\n\n" + title + "\n\n" + text + "\n" + imageUrl);
        const shareUrl = `https://wa.me/?text=${fullText}`;
        return shareUrl;
    }

    $(document).on('click', 'button.share', function(e) {
        e.preventDefault();

        const spage = $('.spage');
        const surveyUrl = spage.data('share-survey');
        const fullImageUrl = spage.data('share-img');
        const title = spage.data('share-title');
        const text = spage.data('share-text');

        let targetLinkBtn = $(e.target).data('messenger');

        let shareUrl = '';
        if (targetLinkBtn === 'telegram') {
            shareUrl = generateTelegramShareLink(surveyUrl, fullImageUrl, title, text);
        } else if (targetLinkBtn === 'whatsapp') {
            shareUrl = generateWhatsAppShareLink(surveyUrl, fullImageUrl, title, text);
        }

        window.open(shareUrl, '_blank');
    })
</script>