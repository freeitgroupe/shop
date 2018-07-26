<?php

namespace app\widgets\menu;


use ishop\App;
use ishop\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'div';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    //Заполняем опции для меню
    protected function getOptions($options)
    {
        foreach($options as $k=>$v) {
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }

    }

    //для формирования меню
    protected function run(){
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            if(!$this->data){
                $this->data = \R::getAssoc("SELECT * FROM {$this->table} WHERE  `view` = '1'");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            /*if($this->cache){
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }*/

        }
        //debug($this->tree);
        $this->output();

    }

    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach ($this->attrs as $k=>$v){
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} $attrs>";
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    //для формирования дерева категорий
    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node){
            if(!$node['parent']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    //для получения html кода
    protected function getMenuHtml($tree, $tab = '', $tpl= ''){
        $str = '';
        foreach ($tree as $id=>$category){
            $str .= $this->catToTemplate($category, $tab, $id, $tpl);
        }
        return $str;

    }

    //для формрования кода в шаблон
    protected function catToTemplate($category, $tab, $id, $tpl){
        ob_start();
        if($tpl){
            $this->tpl = $tpl;
        }
        if(!isset($category['childs']) && $category['parent'] == 0){
            $this->tpl = WWW . '/menu/menu.php';
        }
        require $this->tpl;
        return ob_get_clean();
    }


}