<div class="modal modal-language">
    <div class="modal-content">
        <div class="modal-title">Select language</div>
        <div class="modal-body">
            <ul class="modal-language-lang-list">
                <?php foreach (array_reverse(Yii::$app->translateManager->getLanguagesList()) as $language) { ?>
                    <li><a href="<?= $this->getLangUrl($language['code']) ?>" class="<?= $language['code'] === Yii::$app->language ? 'active' : null ?>" data-modal-open data-lang-choose="true"><span><?= $language['title'] ?></span></a></li>
                <?php } ?>
            </ul>
        </div>
    </div> 
</div>
