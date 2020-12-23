<?php

namespace App\Controllers\Common;

use App\App;
use Core\FileDB;

class InstallController
{
    public function install()
    {
        App::$db = new FileDB(DB_FILE);

        App::$db->createTable('users');
        App::$db->insertRow('users', [
            'name' => 'Test',
            'surname' => 'Test',
            'email' => 'test@test.lt',
            'password' => 'test'
        ]);
        App::$db->createTable('feedback');
    }
}

