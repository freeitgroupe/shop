<?php

namespace app\controllers;

use ishop\App;
use ishop\Cache;

class MainController extends AppController
{
    public function indexAction()    {

        $this->setMeta(App::$app->getProperty('shop_name'), 'description', 'keywords');
        $primary_category = \R::find('category', "parent = 0 AND view = '1' ");
        $ProductsHomePage = \R::find('products', "`mark_view` = '1' ORDER BY page_views DESC LIMIT 4");
        $this->setMeta('Главная страница', 'Описание...', 'Ключевики...');
        $this->set(compact('primary_category', 'ProductsHomePage'));
        //debug($primary_category);


        /*$name = 'John';
        $posts = \R::findAll('test');
        $post = \R::find('test', 'id = ?', [2]);
        $age = 30;
        $names = ['Andrey', 'Jane'];
        $cache = Cache::instance();
        //$cache->set('test', $names);
        $data = $cache->get('test');
        debug($data);
        $this->set(compact('name',  'age', 'names', 'posts'));*/
    }

}