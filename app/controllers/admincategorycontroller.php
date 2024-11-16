<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\helpers;
use MVC\core\session;
use MVC\models\category;

class admincategorycontroller extends controller
{
    public $user_data;
    public function __construct()
    {
        session::Start();
        $this->user_data =session::Get('user');
        if (empty($this->user_data)) {
            echo "class not exist";die;
        }
    }

    public function index()
    {
        $category =new category();
        $data = $category->getAllCategory();
        $this->view("back/category", ['title' => 'admin','data'=>$data]);
    }
    public function delete($id)
    {
        $category =new category();
        $data = $category->deleteCategory($id);
        if($data){
            helpers::redirect('admincategory/index');
        }
    }
    public function add()
    {
        $category =new category();
        $this->view("back/addcategory", ['title' => 'admin']);
    }
    public function postadd()
    {   
        $img =$_FILES['img'];
        move_uploaded_file($img['tmp_name'],'img/'.$img['name']);

        $category =new category();
        $data= ['name'=>$_POST['name'],'icon'=>$_POST['icon'],'user_id'=>$this->user_data->id,'img'=>$img['name']];
        $data =$category->addCategory($data);
        if ($data) {
            helpers::redirect('admincategory/index');
        }
    }

    public function update($id)
    {
        
        $category =new category();
        $data = $category->getCategory($id);
        $this->view("back/updatecategory", ['title' => 'admin','data'=>$data]);
    }
    public function postupdate()
    {   
        if (!empty($_FILES['img']['name'])) {
            $img =$_FILES['img'];
            move_uploaded_file($img['tmp_name'],'img/'.$img['name']);
            $data= ['name'=>$_POST['name'],'icon'=>$_POST['icon'],'user_id'=>$this->user_data->id,'img'=>$img['name']];
        } else {
            $data= ['name'=>$_POST['name'],'icon'=>$_POST['icon'],'user_id'=>$this->user_data->id ];
        }
        $category =new category();
        $id =['id'=>$_POST['id']];
        $data =$category->updateCategory($data,$id);
        if ($data) {
            helpers::redirect('admincategory/index');
        }
    }
}
