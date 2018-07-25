<?php $parent = isset($category['childs']);?>
<div class="singleMobile clear">
    <div class="headingWrapper clear">
        <div class="mobileIcon ico1">
            <img src="<?= CAT_IMG . $category['image']?>">
        </div>
        <a href="/category/<?=$category['alias']?>" class="singleName"><?=$category['title']?></a>
    </div>
    <?php if(isset($category['childs'])):?>
        <ul class="childList">
            <?=$this->getMenuHtml($category['childs'], '', WWW . '/menu/menu_childs.php') ?>
        </ul>
    <?php endif; ?>
</div>




