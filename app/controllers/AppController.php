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
use ishop\App;
use ishop\base\Controller;
use ishop\Cache;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        //setcookie('currency', 'EUR', time() + 3600*24*7, '/');
        App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
        App::$app->setProperty('cats', self::cacheCategory());
        //debug(App::$app->getProperties());
    }

    public static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM category WHERE `view` = '1'");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
}