<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.06.2018
 * Time: 15:06
 */

namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use ishop\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        $curr = Currency::getCurrencies();
        debug($curr);
    }
}