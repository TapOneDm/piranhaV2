<div class="modal modal-language">
    <div class="modal-content">
        <div class="modal-title">Select language</div>
        <div class="modal-body">
            <ul class="modal-language-lang-list">
                <?php foreach (Yii::$app->translateManager->getLanguagesList() as $language) { ?>
                    <li><a href="<?= $this->getLangUrl($language['code']) ?>" class="<?= $language['code'] === Yii::$app->language ? 'active' : null ?>" data-modal-open data-lang-choose="true"><img src="/static/img/<?=$language['code'].'-flag.png'?>" alt="<?=$language['title']?>"><span><?= $language['title'] ?></span></a></li>
                <?php } ?>
            </ul>
        </div>
    </div> 
</div>