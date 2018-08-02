<?php
define("DEBUG", 1); //0 - production, 1 - development
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/ishop/core');
define("LIBS", ROOT . '/vendor/ishop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'shop');
define("DEF_ACTION", 'index');

// http://ishop2.loc/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://ishop2.loc/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// http://ishop2.loc
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);
define("ADMIN", PATH . '/admin');
define("CAT_IMG",PATH . '/uploads_images/category/baseimg/');
define("PROD_IMG",PATH . '/uploads_images/product/baseimg/');
define("GALLERY_IMG",PATH . '/uploads_images/product/thumbs/');

//echo __DIR__;
require_once ROOT . '/vendor/autoload.php';