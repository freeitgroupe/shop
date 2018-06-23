<?php

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';
new \ishop\App();

//debug(\ishop\App::$app->getProperties());
//throw new Exception('Page not found!', 500);
//debug(\ishop\Router::getRoutes());
