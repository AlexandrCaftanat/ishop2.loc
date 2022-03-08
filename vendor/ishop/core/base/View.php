<?php

namespace ishop\base;

class View{
    public $route;
    public $controller;
    public $layout;
    public $model;
    public $view;
    public $prefix;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '',$view = '', $meta){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->meta = $meta;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];

        if ($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }

    }

    public function render($data){
        if (is_array($data)){
            extract($data);
        }
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}". ".php";

        if (file_exists($viewFile)){
            ob_start();
            require $viewFile;
            $content = ob_get_clean();
        }else{
            throw new \Exception("Не найден вид {$viewFile}", 500);
        }
        if (false !== $this->layout){
                $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (file_exists($layoutFile)){
                require_once $layoutFile;
            }else{
                throw new \Exception("Не найден шаблон {$layoutFile}", 500);
            }
        }
    }


    public function getMeta(){

        $output = '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL ;
        $output .= '<title>'.$this->meta['title'].'</title>' . PHP_EOL;
       return $output;
    }

}