<?php

namespace App\Controllers\Common\Auth;

use App\App;
use App\Controllers\Base\UserController;

class LogoutController extends UserController
{
    public function logout()
    {
        App::$session->logout('/');
    }

}