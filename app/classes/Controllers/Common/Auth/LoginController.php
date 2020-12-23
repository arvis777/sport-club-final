<?php

namespace App\Controllers\Common\Auth;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Forms\Common\Auth\LoginForm;
use Core\View;

class LoginController extends GuestController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new LoginForm();
        $this->page = new BasePage([
            'title' => 'Login'
        ]);
    }


    public function login()
    {
        if (isset($_POST['login'])) {
            var_dump('fd');
            return [App::$router::getUrl('login') => 'Login'];
        }

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$session->login($clean_inputs['email'], $clean_inputs['password']);
            if (App::$session->getUser()) {
                header('Location: /');
                exit();
            }
        }

        $content = new View([
            'title' => 'Login',
            'form' => $this->form->render()
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/forms.tpl.php'));

        return $this->page->render();
    }
}