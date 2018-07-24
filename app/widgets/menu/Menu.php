<?php

namespace app\widgets\menu;


use ishop\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        debug($this->table);
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

        }
        $this->output();

    }

    protected function output(){
        echo $this->menuHtml;
    }
}