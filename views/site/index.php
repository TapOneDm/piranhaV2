<?php

use yii\helpers\Html;

$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app', 'Добро пожаловать в школу плавания PIRANHA. Мы единственные в Тбилиси, кто успешно работает с тремя категориями пловцов: начальное обучение (дети), взрослые и спортсмены с разрядом.')
]);

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
    <div class="container">
        <h1 class="intro-title"><?= Yii::t('app', 'Научим плавать, укрепим здоровье и исправим осанку. Вы полюбите спорт и уверенно будете держаться на воде.') ?></h1>
        <div class="intro-actions">
            <button data-modal-open data-modal="modal-sign" type="button" class="btn active"><?= Yii::t('app', 'Записаться на пробное занятие') ?></button>
            <button type="button" data-anchor="prices" class="btn"><?= Yii::t('app', 'Посмотреть тарифы') ?></button>
        </div>
        <div data-modal-open data-modal="modal-adult" class="intro-adult"><button type="button" class="btn"><?= Yii::t('app', 'Хочу на тренировки  для взрослых') ?></button></div>
        <div class="intro-image"><img src="/static/img/main-logo.svg" loading="lazy" alt="Piranha"></div>
        <div class="intro-instagram"><a href="<?= Yii::$app->language == 'ru' ? 'https://www.instagram.com/piranha.ge?igsh=MXN3bnRla2Z5YzNnMg==' : 'https://www.instagram.com/piranhageo/?igsh=OXFzdXR1NnJsZzU3' ?>" target="_blank"><i class="icon-instagram"></i></a></div>
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
                    <a href="/static/img/about/about_1.jpg" data-fancybox="about" loading="lazy" class="about-image"><img src="/static/img/about/about_1.jpg" alt="about_1"></a>
                    <a href="/static/img/about/about_2.jpg" data-fancybox="about" loading="lazy" class="about-image"><img src="/static/img/about/about_2.jpg" alt="about_2"></a>
                    <a href="/static/img/about/about_3.jpg" data-fancybox="about" loading="lazy" class="about-image"><img src="/static/img/about/about_3.jpg" alt="about_3"></a>
                </div>
                <div class="about-text"><?= Yii::t('app', 'Международная плавательная школа Piranha существует больше 7 лет. За это время мы разработали авторские методики и помогаем  детям от двух месяцев и взрослым <mark>избавиться от страха воды, проплыть свои первые метры</mark>, освоить четыре стиля плавания, замотивироваться на участие в соревнованиях, а также <mark>улучшить осанку</mark>, <mark>вернуть крепкий сон</mark> и найти друзей в другой стране.') ?></div>
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
                            <div class="front-image">
                                <img src="<?= $item['imageSrc'] ?>" loading="lazy" alt="<?php $item['title'] ?>">
                            </div>
                        </div>
                        <div class="back">
                            <div class="back-title">
                            </div>
                            <div class="back-text"><?= $item['text'] ?></div>
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
                            <img src="<?= $item['imageSrc'] ?>" loading="lazy" alt="<?= $item['title'] ?>">
                        </div>
                        <div class="price-item-mid">
                            <span><?= $item['title'] ?></span>
                            <ul>
                                <?php foreach($item['points'] as $point) { ?>
                                    <li><?= Html::encode($point) ?></li>
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
            <div class="slider-arrows">
                <button class="prev-arrow"><i class="icon-chevron-left"></i></button>
                <button class="next-arrow"><i class="icon-chevron-right"></i></button>
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
                    <?php if (in_array(Yii::$app->language, $item['show'])) { ?>
                        <div class="coach-item">
                            <a href="<?= $item['imageSrc'] ?>" loading="lazy" data-fancybox="coach" class="coach-item-image"><img src="<?= $item['imageSrc'] ?>" alt="<?= $item['name'] ?>"></a>
                            <div class="coach-item-info">
                                <div class="coach-item-info-status"><?= $item['status'] ?></div>
                                <div class="coach-item-info-name"><?= $item['name'] ?></div>
                                <ul class="coach-item-skills">
                                    <?php foreach ($item['skills'] as $skill) { ?>
                                        <li><?= $skill ?></li>
                                    <?php } ?>
                                </ul>
                                <?php if (!empty($item['caption'])) { ?>
                                    <div class="coach-item-info-caption"><?= $item['caption'] ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="slider-arrows">
                <button class="prev-arrow"><i class="icon-chevron-left"></i></button>
                <button class="next-arrow"><i class="icon-chevron-right"></i></button>
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
                    <div class="address-item <?= $item['disabled'] ? 'disabled' : '' ?>">
                        <div class="item-image">
                            <img src="<?= $item['imageSrc'] ?>" loading="lazy" alt="<?= $item['title'] ?>">
                        </div>
                        <div class="item-content">
                            <div
                                style="visibility: <?= !empty($item['title']) ? 'visible;' : 'hidden;' ?>" class="item-content-title"><?= $item['title'] ?></div>
                            <div
                                style="visibility: <?= !empty($item['text']) ? 'visible;' : 'hidden;' ?>"
                                class="item-content-text"><?= $item['text'] ?></div>
                            <a
                                href="<?= $item['coords_google'] ?>"
                                class="item-content-link"
                                target="_blank"
                                style="visibility: <?= !empty($item['coords_google']) ? 'visible;' : 'hidden;' ?>"
                            ><?= Yii::t('app', 'Показать на карте', ['title' => 'Google']) ?></a>
                            <a
                                href="<?= $item['coords_yandex'] ?>"
                                class="item-content-link"
                                target="_blank"
                                style="visibility: <?= !empty($item['coords_yandex']) ? 'visible;' : 'hidden;' ?>"
                            ><?= Yii::t('app', 'Показать на карте', ['title' => 'Yandex']) ?></a>
                        </div>

                        <?php if ($item['disabled']) { ?>
                            <div class="address-disabled">
                                <div class="coming-soon">Coming soon</div>
                                <button
                                    class="disabled-sign btn"
                                    type="button"
                                    data-address="<?= $item['text'] ?>"
                                    data-modal-open
                                    data-modal="modal-address-request"
                                ><?= Yii::t('app', 'Оставить заявку') ?></button>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="slider-arrows">
                <button class="prev-arrow"><i class="icon-chevron-left"></i></button>
                <button class="next-arrow"><i class="icon-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>

<?php if (Yii::$app->language === 'ru') { ?>
    <div id="review" class="page review">
        <div class="container">
            <div class="page-caption">
                <h2 class="caption-text"><?= Yii::t('app', 'Ученики, которые пришли к желаемому результату') ?></h2>
                <button data-modal-open data-modal="modal-sign" class="caption-button"><?= Yii::t('app', 'Отзывы') ?></button>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="column">
                        <a href="/static/img/review/review_3.jpg" data-fancybox="reviews"><img src="/static/img/review/review_3.jpg" loading="lazy" alt="review"></a>
                        <a href="/static/img/review/review_1.jpg" data-fancybox="reviews"><img src="/static/img/review/review_1.jpg" loading="lazy" alt="review"></a>
                    </div>
                    <div class="column">
                        <a href="/static/img/review/review_4.jpg" data-fancybox="reviews"><img src="/static/img/review/review_4.jpg" loading="lazy" alt="review"></a>
                        <a href="/static/img/review/review_5.jpg" data-fancybox="reviews"><img src="/static/img/review/review_5.jpg" loading="lazy" alt="review"></a>
                    </div>
                    <div class="column">
                        <a href="/static/img/review/review_2.jpg" data-fancybox="reviews"><img src="/static/img/review/review_2.jpg" loading="lazy" alt="review"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div id="questions" class="page questions">
    <div class="container">
        <div class="page-caption">
            <h2 class="caption-text"><?= Yii::t('app', 'Всё, что вам нужно знать перед началом занятий') ?></h2>
            <button data-modal-open data-modal="modal-sign" class="caption-button right"><?= Yii::t('app', 'Вопросы') ?></button>
        </div>
        <div class="page-content">
            <div class="collapse-items answer-items">
                <?php foreach (\app\models\Question::getItems() as $item) { ?>
                    <div class="collapse-item">
                        <div class="collapse-caption"><?= $item['title'] ?> <i class="icon-times1"></i></div>
                        <div class="collapse-content">
                            <p><?= $item['text'] ?></p>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<div id="gallery" class="page gallery">
    <div class="container">
        <div class="page-caption">
            <h2 class="caption-text"><?= Yii::t('app', 'Галерея') ?></h2>
            <button class="caption-button"><?= Yii::t('app', 'Фото') ?></button>
        </div>
        <div class="page-content">
            <div class="gallery-items">
                <div class="column">
                    <a href="/static/img/gallery/gallery_1.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_1.jpg" loading="lazy" alt="gallery"></a>
                    <a href="/static/img/gallery/gallery_2.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_2.jpg" loading="lazy" alt="gallery"></a>
                </div>
                <div class="column">
                    <a href="/static/img/gallery/gallery_15.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_15.jpg" alt="gallery"></a>
                    <a href="/static/img/gallery/gallery_5.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_5.jpg" loading="lazy" alt="gallery"></a>
                </div>
                <div class="column">
                    <a href="/static/img/gallery/gallery_16.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_16.jpg" alt="gallery"></a>
                    <a href="/static/img/gallery/gallery_6.jpg" data-fancybox="gallery"><img src="/static/img/gallery/gallery_6.jpg" loading="lazy" alt="gallery"></a>
                </div>
            </div>
            <button type="button" class="gallery-load-more btn pink"><?= Yii::t('app', 'Смотреть все фото') ?></button>
        </div>
    </div>
</div>