<?php
namespace MVC\models;
use MVC\core\model;
class category extends model{
    static function getAllCategory(){
        $data = model::db()->rows("SELECT * FROM category");
        $data =json_decode(json_encode($data),true);
        return $data;
    }
    static function deleteCategory($id){
        $data = model::db()->delete("category",['id'=>$id]);
        $data =json_decode(json_encode($data),true);
        return $data;
    }
    static function addCategory($data){
        $data = model::db()->insert("category",$data);
        $data =json_decode(json_encode($data),true);
        return $data;
    }
    static function getCategory($id){
        $data = model::db()->row("SELECT * FROM category WHERE `id` =$id");
        $data =json_decode(json_encode($data),true);
        return $data;
    }
    static function updateCategory($data,$id){
        $data = model::db()->update("category",$data,$id);
        // $data =json_decode(json_encode($data),true);
        return $data;
    }
    
}