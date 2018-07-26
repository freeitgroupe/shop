<?php

use ishop\Router;

//use router
Router::add('^product/(?P<alias>[a-z0-9-_]+)/?$',['controller'=>'Product', 'action'=>'view']);

//default routes for backend
Router::add('^admin$', ['controller'=>'Main', 'action'=>'index', 'prefix'=>'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix'=>'admin']);

//default routes for front
Router::add('^$', ['controller'=>'Main', 'action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');