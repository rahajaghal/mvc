<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\Session;
use MVC\core\helpers;
use MVC\models\user;
use GUMP;

class usercontroller extends controller
{
    public function __construct()
    {
        session::Start();
    }

    public function index()
    {
        echo "user";
    }

    public function login()
    {
        $this->view("home/login", ['title' => 'login']);
    }
    public function postlogin()
    {
        $v = GUMP::is_valid($_POST, [
            'email' => 'required'
        ]);
        if ($v == 1) {
            $user = new user();
            $data = $user->getUser($_POST['email'], $_POST['password']);
            session::Set('user', $data);
            // header('LOCATION: user/index');
            helpers::redirect("adminpost/index");
        }
    }
    public function logout()
    {
        session::Stop();
    }
}
