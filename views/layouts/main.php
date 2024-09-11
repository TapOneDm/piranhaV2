<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\components\Language;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->title = Language::getStaticTr(
    [
        'ru' => 'Piranha | Swimming school',
        'en' => 'Piranha | Swimming school',
        'ge' => 'Piranha | Swimming school',
    ]
);
$excludedUrlsPattern = '/(admin|error).*/';
preg_match($excludedUrlsPattern, Yii::$app->request->url, $matches);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/static/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/static/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/static/favicon/favicon-16x16.png">
    <link rel="manifest" href="/static/favicon/site.webmanifest">
    <link rel="mask-icon" href="/static/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#E3007B">
    <meta name="theme-color" content="#E3007B">    
    <meta name="description" lang="ru" content="Добро пожаловать в школу плавания PIRANHA. Мы единственные в Тбилиси, кто успешно работает с тремя категориями пловцов: начальное обучение (дети), взрослые и спортсмены с разрядом.">
    <meta name="description" lang="en" content="Welcome to PIRANHA Swimming School! We are the only swimming school in Tbilisi that works exclusively with three types of swimmers: primary swimming education (children), adults and professional athletes.">
    <meta name="description" lang="ge" content="კეთილი იყოს თქვენი მობრძანება პირანიას ცურვის სკოლაში!ჩვენ ერთადერთი ვართ თბილისში, ვინც წარმატებით მუშაობს სამი კატეგორიის მოცურავეებთან: დაწყებითი (ბავშვები), მოზრდილები და მოწინავე სპორტსმენები.">
    <meta name="keywords" content="Плавание,бассейн,детский бассейн,детское плавание,плавание для взрослых,плавание Тбилиси,плавание Грузия,обучение плаванию,Босфор,грудничковое плавание">
    <meta name="robots" content="all">
    <?php $this->head() ?>
</head>

<body>
    <div class="wrapper">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <?= $this->render('header') ?>
            <?= $content ?>
        </div>
            <?php if (1 > 2) { ?>
                <!-- Google tag (gtag.js) -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=G-VG2R4RJ3X5"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());

                    gtag('config', 'G-VG2R4RJ3X5');
                </script>
            <?php } ?>
        <?php $this->endBody() ?>
    </div>
</body>

</html>
<?php $this->endPage() ?>
