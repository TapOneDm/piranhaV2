<div class="header">
    <div class="container">
        <a href="<?= $this->getWebsiteHomeUrl() ?>" class="logo"><img src="/static/img/logo.svg" alt="Logo"></a>
        <div class="menu">
            <i class="icon-times mobile-close"></i>
            <ul class="items">
                <li class="mobile-logo"><a href="<?= $this->getWebsiteHomeUrl() ?>"><img src="/static/img/main-logo.svg" alt="Logo"></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="about"' ?>><?= Yii::t('app', 'О нас') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="expanded"' ?>><?= Yii::t('app', 'Подход') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="prices"' ?> class="contrast"><?= Yii::t('app', 'Тарифы') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="coach"' ?>><?= Yii::t('app', 'Команда') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="address"' ?>><?= Yii::t('app', 'Адреса') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="review"' ?>><?= Yii::t('app', 'Отзывы') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="questions"' ?>><?= Yii::t('app', 'FAQ') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="gallery"' ?>><?= Yii::t('app', 'Галерея') ?></a></li>
                <li><a <?= Yii::$app->controller->action->id === 'adults' ? 'href="/"' : 'href="#" data-anchor="contacts"' ?>><?= Yii::t('app', 'Контакты') ?></a></li>
            </ul>
            <div class="header-instagram"><a href="<?= Yii::$app->language == 'ru' ? 'https://www.instagram.com/piranha.ge?igsh=MXN3bnRla2Z5YzNnMg==' : 'https://www.instagram.com/piranhageo/?igsh=OXFzdXR1NnJsZzU3' ?>" target="_blank"><i class="icon-instagram"></i></a></div>
            <?= $this->render('_lang') ?>
            <button data-modal-open data-modal="modal-sign" class="header-sign-button btn"><?= Yii::t('app', 'Записаться') ?></button>
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
