<div class="lang">
    <div class="lang-current"><?= Yii::$app->language ?></div>
    <ul class="lang-items">
        <?php foreach (Yii::$app->translateManager->getLanguagesList() as $language) { ?>
            <li><a href="<?= $this->getLangUrl($language['code']) ?>" class=<?= $language['code'] === Yii::$app->language ? 'active' : null ?>><?= $language['title'] ?></a></li>
        <?php } ?>
    </ul>
</div>