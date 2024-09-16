<?php

?>

<div class="sign-up-button">
    <button data-modal-open data-modal="modal-sign" type="button"><i class="icon-pencil-alt"></i><span><?= Yii::t('app', 'Записаться на превое занятие') ?></span></button>
</div>

<div id="intro" class="page intro">
    <div class="container">
        <div class="intro-title"><?= Yii::t('app', 'Научим плавать, укрепим здоровье и исправим осанку. Вы полюбите спорт и уверенно будете держаться на воде.') ?></div>
        <div class="intro-actions">
            <button data-modal-open data-modal="modal-sign" type="button" class="btn active"><?= Yii::t('app', 'Записаться на пробное занятие') ?></button>
            <button type="button" data-anchor="prices" class="btn"><?= Yii::t('app', 'Посмотреть тарифы') ?></button>
        </div>
        <div data-modal-open data-modal="modal-adult" class="intro-adult"><button type="button" class="btn"><?= Yii::t('app', 'Я взрослый') ?></button></div>
        <div class="intro-image"><img src="/static/img/main-logo.svg" alt="Piranha"></div>
    </div>
</div>
<img class="wave" src="/static/img/wave_pink.svg" alt="wave">

<div id="privileges" class="page privileges">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Если важно (не только) научиться <br/> плавать') ?></div>
            <button data-modal-open data-modal="modal-sign" class="caption-button"><?= Yii::t('app', 'Мы можем помочь') ?></button>
        </div>

        <div class="page-content">

        </div>
        <div class="privileges-items">
            <?php foreach (\app\models\Privelege::getItems() as $item) { ?>
                <div class="privileges-item">
                    <div class="privileges-item-caption">
                        <i class="icon-<?= $item['icon'] ?>"></i>
                        <span><?= $item['title'] ?></span>
                    </div>
                    <div class="privileges-item-text">
                        <?= $item['text'] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="about" class="page about">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Школа Piranha') ?></div>
            <button data-modal-open data-modal="modal-sign" class="caption-button right"><?= Yii::t('app', 'О нас') ?></button>
        </div>

        <div class="page-content">
            <div class="about-content">
                <div class="about-images">
                    <div class="about-image"><img src="/static/img/about/about_1.jpg" alt="about"></div>
                    <div class="about-image"><img src="/static/img/about/about_2.jpg" alt="about"></div>
                    <div class="about-image"><img src="/static/img/about/about_3.jpg" alt="about"></div>
                </div>
                <div class="about-text"><?= Yii::t('app', 'Международная плавательная школа Piranha существует больше 7 лет. За это время мы разработали авторские методики и помогаем детям и взрослым от 2,5 до 99 лет избавиться от страха воды, проплыть свои первые метры, освоить четыре стиля плавания, замотивироваться на участие в соревнованиях, а также улучшить осанку, вернуть крепкий сон и найти друзей в другой стране.') ?></div>
            </div>

            <div class="about-indicators">
                <?php foreach (\app\models\About::getIndicatorsItems() as $item) { ?>
                    <div class="about-indicator">
                        <span><?= $item['title'] ?></span>
                        <p><?= $item['text'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div id="expanded" class="page expanded">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', '«За» индивидуальный подход, <br/>раскрывающий потенциал каждого ученика') ?></div>
            <button data-modal-open data-modal="modal-sign" class="caption-button"><?= Yii::t('app', 'Как мы учим') ?></button>
        </div>

        <div class="page-content">
            <div class="expanded-items">
                <?php foreach (\app\models\Expanded::getItems() as $item) { ?>
                    <div class="expanded-item">
                        <div class="front">
                            <div class="front-title">
                                <div><?= $item['title'] ?></div>
                                <div class="undo"><i class="icon-undo"></i></div>
                            </div>
                            <img src="<?= $item['imageSrc'] ?>" alt="logo">
                        </div>
                        <div class="back">
                            <div class="back-title">
                            </div>
                            <div><?= $item['text'] ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div id="prices" class="page prices">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Формат тренировок под любой запрос — от мини-групп <br/> до персональной стратегии') ?></div>
            <button data-modal-open data-modal="modal-sign" class="caption-button right"><?= Yii::t('app', 'Записаться') ?></button>
        </div>

        <div class="page-content">
            <div class="price-items">
                <?php foreach (\app\models\Price::getItems() as $item) { ?>
                    <div class="price-item">
                        <div class="price-item-top">
                            <img src="<?= $item['imageSrc'] ?>" alt="<?= $item['title'] ?>">
                        </div>
                        <div class="price-item-mid">
                            <span><?= $item['title'] ?></span>
                            <ul>
                                <?php foreach($item['points'] as $point) { ?>
                                    <li><?= $point ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="price-item-bottom">
                            <div class="price-hint"><?= $item['price'] ?></div>
                            <button
                                data-modal-open
                                data-check="<?= $item['check'] ?>"
                                data-modal="modal-sign"
                                type="button"
                                class="btn pink"
                            ><?= Yii::t('app', 'Записаться') ?></button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div id="coach" class="page coach">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Команда профессионалов своего дела') ?></div>
            <button data-modal-open data-modal="modal-sign" class="caption-button"><?= Yii::t('app', 'Команда') ?></button>
        </div>

        <div class="page-content">
            <div class="coach-items">
                <?php foreach (\app\models\Coach::getItems() as $item) { ?>
                    <div class="coach-item">
                        <div class="coach-item-image"><img src="/static/img/coach/coach.jpg" alt="<?= $item['name'] ?>"></div>
                        <div class="coach-item-info">
                            <div class="coach-item-info-name"><?= $item['name'] ?></div>
                            <div class="coach-item-info-caption"><?= $item['caption'] ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div id="address" class="page address">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Наши адреса') ?></div>
            <button data-modal-open data-modal="modal-sign" class="caption-button right"><?= Yii::t('app', 'Мы на карте') ?></button>
        </div>

        <div class="page-content">
            <div class="address-items">
                <?php foreach(\app\models\Address::getItems() as $item) { ?>
                    <div class="address-item">
                        <div class="item-image">
                            <img src="<?= $item['imageSrc'] ?>" alt="<?= $item['title'] ?>">
                        </div>
                        <div class="item-content">
                            <div class="item-content-title"><?= $item['title'] ?></div>
                            <div class="item-content-text"><?= $item['text'] ?></div>
                            <a
                                href="<?= $item['coords'] ?>"
                                class="item-content-link"
                                target="_blank"
                            ><?= Yii::t('app', 'Показать на карте') ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div id="review" class="page review">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Ученики, которые пришли к желаемому результату') ?></div>
            <button data-modal-open data-modal="modal-sign" class="caption-button right"><?= Yii::t('app', 'Отзывы') ?></button>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="column">
                    <a href="/static/img/review/review_3.jpg" data-fancybox="reviews"><img src="/static/img/review/review_3.jpg" alt="review"></a>
                    <a href="/static/img/review/review_1.jpg" data-fancybox="reviews"><img src="/static/img/review/review_1.jpg" alt="review"></a>
                </div>
                <div class="column">
                    <a href="/static/img/review/review_4.jpg" data-fancybox="reviews"><img src="/static/img/review/review_4.jpg" alt="review"></a>
                    <a href="/static/img/review/review_5.jpg" data-fancybox="reviews"><img src="/static/img/review/review_5.jpg" alt="review"></a>
                </div>
                <div class="column">
                    <a href="/static/img/review/review_2.jpg" data-fancybox="reviews"><img src="/static/img/review/review_2.jpg" alt="review"></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="footer" class="page footer">
    <img class="wave" src="/static/img/wave.svg" alt="wave">
    <div class="footer-content">
        <div class="footer-info">
            <div class="footer-info-logo"><img src="/static/img/main-logo.svg" alt="piranha"></div>
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
            <p><?= Yii::t('app', 'Меню') ?></p>
            <ul class="footer-nav-items">
                <li><a href="#" data-anchor="about"><?= Yii::t('app', 'О нас') ?></a></li>
                <li><a href="#" data-anchor="expanded"><?= Yii::t('app', 'Подход') ?></a></li>
                <li><a href="#" data-anchor="prices"><?= Yii::t('app', 'Услуги') ?></a></li>
                <li><a href="#" data-anchor="coach"><?= Yii::t('app', 'Команда') ?></a></li>
                <li><a href="#" data-anchor="address"><?= Yii::t('app', 'Адреса') ?></a></li>
                <li><a href="#" data-anchor="review"><?= Yii::t('app', 'Отзывы') ?></a></li>
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






