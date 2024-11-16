<?php
namespace MVC\core;
class controller{
    public function view($path,$params){
        extract($params);
        require_once(VIEW.$path.".php");
    }
}