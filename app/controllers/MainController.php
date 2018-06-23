<?php

namespace app\controllers;

use ishop\App;

class MainController extends AppController
{
    public function indexAction()
    {
        debug($this->controller);
        //echo __METHOD__;
    }

}