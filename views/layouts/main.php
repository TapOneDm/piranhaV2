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
    <title><?= Html::encode($this->title ?? Yii::t('app', 'Школа плавания - Piranha')) ?></title>
    <?= $this->render('_favicon') ?>
    <meta name="msapplication-TileColor" content="#E3007B">
    <meta name="theme-color" content="#E3007B">    
    <meta charset="utf-8">
    <?= $this->initMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?= $this->render('header') ?>
        <?= $content ?>
        <?= $this->render('_footer') ?>
        <?= $this->render('../site/_modals') ?>
    </div>
        <?php if ((getenv('ENV') !== 'DEV')) { ?>
            <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) { ?>
                <script async src="https://www.googletagmanager.com/gtag/js?id=G-VG2R4RJ3X5"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());

                    gtag('config', 'G-VG2R4RJ3X5');
                </script>
            <?php } ?>
            <!-- Google tag (gtag.js) -->

            <!-- Yandex.Metrika counter -->
            <script data-cfasync="false" type="text/javascript">
            (function(){
            var a = function() {try{return !!window.addEventListener} catch(e) {return !1} },
            b = function(b, c) {a() ? document.addEventListener("load", b, c) : document.attachEvent("onreadystatechange", b)};
            b(function(){

            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(XXXXXXXX, "init", {
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
            });

            }, false);
            })();
            </script>
            <noscript><div><img src="https://mc.yandex.ru/watch/98753176" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->
        <?php } ?>

    <!-- <div id="overlay">
        <img src="/static/img/logo.svg" alt="logo">
        <span class="loader"></span>
    </div> -->
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
