<?php
namespace MVC\core;
use Dcblogdev\PdoWrapper\Database as Database;
class model{
    
    public function db(){
        $options =[
            'username'=>USERNAME,        
            'database'=>DATABASE, 
                   
            'password'=>PASSWORD,        
            'type'=>DATABASE_TYPE,        
            'charset'=>'utf8',        
            'host'=>HOST,        
            'port'=>'3306'   
        ];
        return $db =new Database($options);
    }
}