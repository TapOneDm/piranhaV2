<div id="footer" class="page footer">
    <img class="wave" src="/static/img/wave.svg" alt="wave">
    <div class="container">
        <div class="footer-content">
            <div class="footer-info">
                <a href="<?= $this->getWebsiteHomeUrl() ?>" class="footer-info-logo"><img src="/static/img/main-logo.svg" alt="piranha"></a>
                <div class="footer-info-location"><?= Yii::t('app', 'Tbilisi, GEORGIA') ?></div>
            </div>
            <div class="footer-links">
                <p><?= Yii::t('app', 'Наши соц. сети') ?></p>
                <div class="footer-links-icons">
                    <a href="https://www.instagram.com/piranha.ge/" class="icon-link"><i class="icon-instagram"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100084172242937" class="icon-link"><i class="icon-facebook"></i></a>
                    <a href="https://www.youtube.com/@kolotyginswim" class="icon-link"><i class="icon-youtube"></i></a>
                </div>
            </div>
            <div class="footer-nav">
                <ul class="footer-nav-items">
                    <li><a href="#" data-anchor="about"><?= Yii::t('app', 'О нас') ?></a></li>
                    <li><a href="#" data-anchor="expanded"><?= Yii::t('app', 'Подход') ?></a></li>
                    <li><a href="#" data-anchor="prices"><?= Yii::t('app', 'Тарифы') ?></a></li>
                    <li><a href="#" data-anchor="coach"><?= Yii::t('app', 'Команда') ?></a></li>
                    <li><a href="#" data-anchor="address"><?= Yii::t('app', 'Адреса') ?></a></li>
                    <li><a href="#" data-anchor="review"><?= Yii::t('app', 'Отзывы') ?></a></li>
                    <li><a href="#" data-anchor="questions"><?= Yii::t('app', 'FAQ') ?></a></li>
                    <li><a href="#" data-anchor="gallery"><?= Yii::t('app', 'Галерея') ?></a></li>
                </ul>
            </div>
            <div class="footer-contacts">
                <p><?= Yii::t('app', 'Контакты') ?>:</p>
                <div class="footer-contacts-block">
                    <a href="mailto: piranha.information@gmail.com">piranha.information@gmail.com</a>
                    <a href="tel: +995597583484">+995 597 583 484</a>
                </div>
            </div>
        </div>
    </div>
</div>