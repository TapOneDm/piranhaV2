<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <div class="page-error">
        <div class="container">
            <div class="page-error-content">
                <div><?= Yii::$app->language === 'ru' ? 'Похоже, произошла ошибка' : 'Looks like there was an error' ?></div>
                <div><a href="/"><?= Yii::$app->language === 'ru' ? 'На главную' : 'Go back' ?></a></div>
            </div>
        </div>
    </div>
</div>