<?php

?>

<div class="page intro">
    <div class="container">
        <div class="intro-title"><?= Yii::t('app', 'Научим плавать, укрепим здоровье и исправим осанку. Вы полюбите спорт и уверенно будете держаться на воде.') ?></div>
        <div class="intro-actions">
            <button type="button" class="btn active"><?= Yii::t('app', 'Записаться на пробное занятие') ?></button>
            <button type="button" class="btn"><?= Yii::t('app', 'Посмотреть тарифы') ?></button>
        </div>
        <div class="intro-image"><img src="/static/img/main-logo.svg" alt="Piranha"></div>
    </div>
</div>
<img src="/static/img/wave_pink.svg" alt="">

<div class="page privileges">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Если важно (не только) научиться <br/> плавать') ?></div>
            <button class="caption-button"><?= Yii::t('app', 'Я могу помочь') ?></button>
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

<div class="page about">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'О школе Piranha') ?></div>
            <button class="caption-button right"><?= Yii::t('app', 'О нас') ?></button>
        </div>

        <div class="page-content">
            <div class="about-content">
                <div class="about-image"><img src="/static/img/about.jpg" alt="about"></div>
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

<div class="page expanded">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', '«За» индивидуальный подход, <br/>раскрывающий потенциал каждого ученика') ?></div>
            <button class="caption-button"><?= Yii::t('app', 'Как я учу') ?></button>
        </div>

        <div class="page-content">
            <div class="expanded-items">
                <?php foreach (\app\models\Expanded::getItems() as $item) { ?>
                    <div class="expanded-item">
                        <div class="front">
                            <div class="front-title">
                                <div><?= $item['title'] ?></div>
                                <div class="undo"><i class="icon-heart-circle"></i></div>
                            </div>
                            <img src="<?= $item['imageSrc'] ?>" alt="logo">
                        </div>
                        <div class="back">
                            <div class="back-title">
                                <div><?= $item['title'] ?></div>
                                <div class="undo"><i class="icon-heart-circle"></i></div>
                            </div>
                            <div><?= $item['text'] ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="page prices">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Формат тренировок под любой запрос — от мини-групп <br/> до персональной стратегии') ?></div>
            <button class="caption-button right"><?= Yii::t('app', 'Записаться') ?></button>
        </div>

        <div class="page-content">
            <div class="price-items">
                <?php foreach (\app\models\Price::getItems() as $item) { ?>
                    <div class="price-item">
                        <div class="price-item-top">
                            <img src="/static/img/main-logo.svg" alt="logo">
                            <span><?= $item['title'] ?></span>
                        </div>
                        <div class="price-item-mid">
                            <ul>
                                <?php foreach($item['points'] as $point) { ?>
                                    <li><?= $point ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="price-item-bottom">
                            <div class="price-hint"><?= $item['price'] ?></div>
                            <button type="button" class="btn pink"><?= Yii::t('app', 'Записаться') ?></button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="page coach">
    <div class="container">
        <div class="page-caption">
            <div class="caption-text"><?= Yii::t('app', 'Команда профессионалов своего дела') ?></div>
            <button class="caption-button"><?= Yii::t('app', 'Команда') ?></button>
        </div>

        <div class="page-content">
            <div class="coach-items">
                <?php foreach (\app\models\Coach::getItems() as $item) { ?>
                    <div class="coach-item">
                        <div class="coach-item-image"><img src="/static/img/coach.jpg" alt="<?= $item['name'] ?>"></div>
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







<div class="page">
    <div class="container">
        <div class="language-toggle">
            <?php foreach (Yii::$app->translateManager->getLanguagesList() as $language) { ?>
                <a href="<?= $this->getLangUrl($language['code']) ?>" class=<?= $language['code'] === Yii::$app->language ? 'active' : null ?>><?= $language['title'] ?></a>
            <?php } ?>
        </div>
        <h1><?= Yii::t('app', 'Название') ?></h1>
    </div>

</div>