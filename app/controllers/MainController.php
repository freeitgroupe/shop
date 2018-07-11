<?php

namespace app\controllers;

use ishop\App;
use ishop\Cache;

class MainController extends AppController
{
    public function indexAction()    {

        $this->setMeta(App::$app->getProperty('shop_name'), 'description', 'keywords');
        $primary_category = \R::find('category', "parent = 0 AND view = '1' ");
        $this->set(compact('primary_category'));
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