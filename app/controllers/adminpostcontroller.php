<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\session;

class adminpostcontroller extends controller
{
    public function __construct()
    {
        session::Start();
        $user_data =session::Get('user');
        if (empty($user_data)) {
            echo "class not exist";die;
        }
    }

    public function index()
    {
        $this->view("back/article", ['title' => 'admin']);
    }
}
