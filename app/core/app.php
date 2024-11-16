<?php
namespace MVC\core;
class app{
    private $controller='homecontroller';
    private $method='index';
    private $params;
    public function __construct()
    {
        $this->url();
        $this->render();
    }

    private function url(){
        if (!empty($_SERVER['QUERY_STRING'])) {
            $url = explode("/",$_SERVER['QUERY_STRING']);
            $this->controller= isset($url[0])?$url[0]."controller":"homecontroller";
            $this->method= isset($url[1])?$url[1]:"index";
            unset($url[0],$url[1]);
            $this->params =array_values($url);
        }
        
    }
    private function render(){
        $controller ="MVC\controllers\\".$this->controller;
        if (class_exists($controller)) {
            $controller =new $controller;
            if (method_exists($controller,$this->method)) {
                if (empty($this->params)) {
                    call_user_func([$controller,$this->method]);
                } else {
                    call_user_func_array([$controller,$this->method],$this->params);
                }
            } else {
                echo "function not exist";
            }
        } else {
            echo "class not exists";
        }
    }

}