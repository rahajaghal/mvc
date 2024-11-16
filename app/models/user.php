<?php
namespace MVC\models;
use MVC\core\model;
class user extends model{
    static function getAllUsers(){
        $data = model::db()->rows("SELECT * FROM user");
        
        return $data;
    }
    static function getUser($email,$password){
        $data = model::db()->row("SELECT * FROM user WHERE `email` =? AND `password` =? " ,[$email,$password]);
        return $data;
    }
    static function setUser($name,$email,$password){
        $data = model::db()->run("INSERT INTO user(`name`,`email`,`password`) VALUES('$name','$email','$password') ");
        return $data;
    }

}