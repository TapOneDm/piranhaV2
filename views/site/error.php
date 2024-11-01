<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = $name;
$isNotFound = $exception->statusCode == 404;
$text = $isNotFound ? Yii::t('app', 'Такая страница не найдена') : Yii::$app->response->statusText;

?>
<div class="page">
    <div class="container">
        <div class="page-error-content">
            <h1><?= $text?></h1>
            <?php if ($exception->statusCode == 404) { ?>
                <div><a href="<?= $this->getWebsiteHomeUrl() ?>"><?= Yii::t('app', 'На главную') ?></a></div>
            <?php } ?>
        </div>
    </div>
</div>