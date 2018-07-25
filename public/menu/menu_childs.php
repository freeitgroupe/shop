<li>
    <div class="childIcon">
        <img src="<?= CAT_IMG . $category['image']?>">
    </div>
    <a href="/category/<?=$category['alias']?>"><?=$category['title']?></a>
</li>
<?php if(isset($category['childs'])):?>
    <?=$this->getMenuHtml($category['childs'], '', WWW . '/menu/menu_childs.php' ) ?>
<?php endif;?>