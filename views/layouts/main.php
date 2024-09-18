<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title ?? Yii::t('app', 'Школа плавания Piranha')) ?></title>
    <?= $this->render('_favicon') ?>
    <meta name="msapplication-TileColor" content="#E3007B">
    <meta name="theme-color" content="#E3007B">    
    <meta charset="utf-8">
    <?= $this->initMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
    <div class="wrapper">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <?= $this->render('header') ?>
            <?= $content ?>
            <?= $this->render('_footer') ?>
            <?= $this->render('../site/_modals') ?>
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

        <div id="overlay"></div>
        <?php $this->endBody() ?>
    </div>
</body>

</html>
<?php $this->endPage() ?>
