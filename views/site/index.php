<?php

use yii\helpers\Html;

$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app', 'Добро пожаловать в школу плавания PIRANHA. Мы единственные в Тбилиси, кто успешно работает с тремя категориями пловцов: начальное обучение (дети), взрослые и спортсмены с разрядом.')
]);

?>

<div class="sign-up-button">
    <button data-modal-open data-modal="modal-sign" type="button"><i class="icon-pencil-alt"></i><span><?= Yii::t('app', 'Записаться на превое занятие') ?></span></button>
</div>

<div id="intro" class="page intro">
    <div class="container">
        <h1 class="intro-title"><?= Yii::t('app', 'Научим плавать, укрепим здоровье и исправим осанку. Вы полюбите спорт и уверенно будете держаться на воде.') ?></h1>
        <div class="intro-actions">
            <button data-modal-open data-modal="modal-sign" type="button" class="btn active"><?= Yii::t('app', 'Записаться на пробное занятие') ?></button>
            <button type="button" data-anchor="prices" class="btn"><?= Yii::t('app', 'Посмотреть тарифы') ?></button>
        </div>
        <div data-modal-open data-modal="modal-adult" class="intro-adult"><button type="button" class="btn"><?= Yii::t('app', 'Хочу на тренировки  для взрослых') ?></button></div>
        <div class="intro-image"><img src="/static/img/main-logo.svg" alt="Piranha"></div>
    </div>
</div>
<img class="wave" src="/static/img/wave_pink.svg" alt="wave">

<div id="privileges" class="page privileges">
    <div class="container">
        <div class="page-caption">
            <h2 class="caption-text"><?= Yii::t('app', 'Если важно (не только) научиться <br/> плавать') ?></h2>
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
            <h2 class="caption-text"><?= Yii::t('app', 'Школа Piranha') ?></h2>
            <button data-modal-open data-modal="modal-sign" class="caption-button right"><?= Yii::t('app', 'О нас') ?></button>
        </div>

        <div class="page-content">
            <div class="about-content">
                <div class="about-images">
                    <a href="/static/img/about/about_1.jpg" data-fancybox="about" class="about-image"><img src="/static/img/about/about_1.jpg" alt="about_1"></a>
                    <a href="/static/img/about/about_2.jpg" data-fancybox="about" class="about-image"><img src="/static/img/about/about_2.jpg" alt="about_2"></a>
                    <a href="/static/img/about/about_3.jpg" data-fancybox="about" class="about-image"><img src="/static/img/about/about_3.jpg" alt="about_3"></a>
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
            <h2 class="caption-text"><?= Yii::t('app', '«За» индивидуальный подход, <br/>раскрывающий потенциал каждого ученика') ?></h2>
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
                            <img src="<?= $item['imageSrc'] ?>" alt="<?php $item['title'] ?>">
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
            <h2 class="caption-text"><?= Yii::t('app', 'Формат тренировок под любой запрос — от мини-групп <br/> до персональной стратегии') ?></h2>
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
            <h2 class="caption-text"><?= Yii::t('app', 'Команда профессионалов своего дела') ?></h2>
            <button data-modal-open data-modal="modal-sign" class="caption-button"><?= Yii::t('app', 'Команда') ?></button>
        </div>

        <div class="page-content">
            <div class="coach-items">
                <?php foreach (\app\models\Coach::getItems() as $item) { ?>
                    <div class="coach-item">
                        <a href="<?= $item['imageSrc'] ?>" data-fancybox="coach" class="coach-item-image"><img src="<?= $item['imageSrc'] ?>" alt="<?= $item['name'] ?>"></a>
                        <div class="coach-item-info">
                            <div class="coach-item-info-name"><?= $item['name'] ?></div>
                            <ul class="coach-item-skills">
                                <?php foreach ($item['skills'] as $skill) { ?>
                                    <li><?= $skill ?></li>
                                <?php } ?>
                            </ul>
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
            <h2 class="caption-text"><?= Yii::t('app', 'Наши адреса') ?></h2>
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
            <h2 class="caption-text"><?= Yii::t('app', 'Ученики, которые пришли к желаемому результату') ?></h2>
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

<div id="gallery" class="page gallery">
    <div class="container">
        <div class="page-caption">
            <h1 class="caption-text"><?= Yii::t('app', 'Галерея') ?></h1>
            <button class="caption-button right"><?= Yii::t('app', 'Фото') ?></button>
        </div>
        <div class="page-content">
            <div class="gallery-items">
                <div class="column">
                    <a href="/static/img/gallery/gallery_1.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_1.jpg" alt="gallery"></a>
                    <a href="/static/img/gallery/gallery_2.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_2.jpg" alt="gallery"></a>
                </div>
                <div class="column">
                    <a href="/static/img/gallery/gallery_3.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_3.jpg" alt="gallery"></a>
                    <a href="/static/img/gallery/gallery_4.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_4.jpg" alt="gallery"></a>
                </div>
                <div class="column">
                    <a href="/static/img/gallery/gallery_5.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_5.jpg" alt="gallery"></a>
                    <a href="/static/img/gallery/gallery_6.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_6.jpg" alt="gallery"></a>
                    <a href="/static/img/gallery/gallery_7.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_7.jpg" alt="gallery"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="rules" class="page rules">
    <div class="container">
        <div class="page-caption">
            <h1 class="caption-text"><?= Yii::t('app', 'Правила посещения детского клуба плавания Piranha') ?></h1>
            <button class="caption-button right"><?= Yii::t('app', 'Правила') ?></button>
        </div>
        <div class="page-content">
            <ul>
                <li><?= Yii::t('app', 'Согласуйте время посещения заранее с нашим администратором.') ?></li>
                <li><?= Yii::t('app', 'Заранее обговорите с нашим администратором формат занятий, на который вы хотели бы записаться : индивидуальная тренировка, сплит занятие ( два человека в одно время у одного тренера), группа.') ?></li>
                <li><?= Yii::t('app', 'Рекомендуем приходить в бассейн за 10 - 15 минут до начала занятия, чтобы иметь возможность подготовиться.') ?></li>
                <li><?= Yii::t('app', 'В бассейне необходимо надеть сменную обувь (тапочки для бассейна).') ?></li>
                <li><?= Yii::t('app', 'Вход в зону бассейна осуществляется за 1-2 минуты до начала занятия.') ?></li>
                <li><?= Yii::t('app', 'Занятие длится 45 минут.') ?></li>
                <li><?= Yii::t('app', 'Срок действия абонементов - 1 месяц.') ?></li>
                <li><?= Yii::t('app', 'Отработать пропущенные тренировки в следующем месяце возможно только с наличием справки от врача. Если возникла необходимость перенести занятия, позаботьтесь об этом своевременно, т.к. в конце месяца может быть мало свободных мест.') ?></li>
                <li><?= Yii::t('app', 'Записать в группу можем, когда ребенок умеет нырять и держаться на воде самостоятельно (маленький бассейн), когда ребенок может самостоятельно проплыть 25-50 метров без остановки (большой бассейн).') ?></li>
            </ul>
            <br>
            <br>
            <span><?= Yii::t('app', 'Для занятий необходимо') ?>:</span>
            <ul>
                <li><?= Yii::t('app', 'сменная обувь, полотенце, купальный костюм, шапочка для плаванья и очки;') ?></li>
                <li><?= Yii::t('app', 'для детей до трех лет: на первое занятие - плавательный одноразовый подгузник или специальные трусики для бассейна.') ?></li>
            </ul>
            <br>
            <br>
            <span><?= Yii::t('app', 'Большая просьба посещать душ перед входом в воду для поддержания чистоты в бассейне.') ?></span>
        </div>
    </div>
</div>
