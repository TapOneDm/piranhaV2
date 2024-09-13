
<div class="header">
    <div class="container">
        <a href="<?= $this->getWebsiteHomeUrl() ?>" class="logo"><img src="/static/img/logo.svg" alt="Logo"></a>
        <div class="menu">
            <i class="icon-times mobile-close"></i>
            <ul class="items">
                <li class="mobile-logo"><a href="<?= $this->getWebsiteHomeUrl() ?>"><img src="/static/img/main-logo.svg" alt="Logo"></a></li>
                <li><a href="#" data-anchor="privileges"><?= Yii::t('app', 'Услуги') ?></a></li>
                <li><a href="#" data-anchor="about"><?= Yii::t('app', 'О нас') ?></a></li>
                <li><a href="#" data-anchor="team"><?= Yii::t('app', 'Команда') ?></a></li>
                <li><a href="#" data-anchor="reviews"><?= Yii::t('app', 'Отзывы') ?></a></li>
                <li><a href="#" data-anchor="prices"><?= Yii::t('app', 'Записаться') ?></a></li>
                <li><a href="#" data-anchor="address"><?= Yii::t('app', 'Адреса') ?></a></li>
            </ul>
            <?= $this->render('_lang') ?>
            <button class="btn"><?= Yii::t('app', 'Записаться') ?></button>
        </div>   
        <div class="mobile-menu-button">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="bg"></div>
    <div class="indicator"></div>
</div>