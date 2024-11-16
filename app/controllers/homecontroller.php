<?php
namespace MVC\controllers;
use MVC\core\controller;
class homecontroller extends controller{
    public function index(){
        $this->view("home/index",['title'=>'home']);
    }
    public function details(){
        $this->view("home/details",['title'=>'details']);
    }

}