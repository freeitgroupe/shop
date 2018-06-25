<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.06.2018
 * Time: 12:34
 */

namespace ishop;


class Router
{
    protected static $routes = []; //all routes
    protected static $route = []; //matched route

    //for add route
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        var_dump($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                }else{
                    throw new \Exception('Method '. $controller::$action . 'not found ', 404);
                }
            }else{
                throw new \Exception('Controller ' . $controller . 'not found', 404);
            }
        }else{
           throw new \Exception('Page not found', 404);
        }
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern=>$route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                //debug($matches);
                foreach ($matches as $k=>$v){
                    if(is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = DEF_ACTION;
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                //debug(self::$route);

                return true;
            }
        }
            return false;
    }

    public static function upperCamelCase($name){
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
        //debug($name);
    }

    public static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url){
        //debug($url);
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }

}