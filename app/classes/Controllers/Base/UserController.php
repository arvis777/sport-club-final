<?php

namespace App\Controllers\Base;

use App\App;

class UserController
{
    protected string $redirect = '/';

    public function __construct()
    {
        if (!App::$session->getUser()) {
            header("Location: $this->redirect");
            exit();
        }
    }
}