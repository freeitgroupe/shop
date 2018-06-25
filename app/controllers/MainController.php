<?php

namespace app\controllers;

use ishop\App;

class MainController extends AppController
{
    public function indexAction()
    {
        //$this->layout = 'test';
        //debug($this->controller);
        //echo __METHOD__;
        $this->setMeta(App::$app->getProperty('shop_name'), 'description', 'keywords');
        $name = 'John';
        $age = 30;
        $names = ['Andrey', 'Jane'];
        $this->set(compact('name',  'age', 'names'));
    }

}