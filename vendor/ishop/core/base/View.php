<?php

namespace ishop\base;


class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];
    public $paramForJsFile = [];

    public function __construct($route, $layout= '', $view='', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if($layout === FALSE){
            $this->layout = FALSE;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
       //debug($this->view);
       if(is_array($data)) extract($data);
       $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
       //debug();
       if(is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            //View for controller
            $content = ob_get_clean();
       }else{
           throw new \Exception("Not found view {$viewFile}", 500);
       }
        //debug($resOtherTemplate);
       if(FALSE !== $this->layout){
           $layoutFile = APP . "/views/layouts/{$this->layout}.php";
           if(is_file($layoutFile)){
               require_once $layoutFile;
           }else{
               throw new \Exception("Template {$this->layout} not found", 500);
           }
       }

    }

    public function getMeta(){
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="'.$this->meta['desc'].'">' . PHP_EOL;
        $output .= '<meta name="keywords" content="'.$this->meta['keywords'].'">' . PHP_EOL;
        return $output;
    }
}