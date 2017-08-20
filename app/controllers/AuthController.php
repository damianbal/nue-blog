<?php

namespace App\Controllers;
use App\Middleware\HasInputs;
use App\Models\Post;
use Core\Database\QueryBuilder;
use Core\Utils;
use App\Middleware\IsAdmin;

use App\Models\Settings;

class AuthController extends Controller
{
    public function sign_in()
    {
        if(\Core\Session::session('signed_in') == true) {
            return "You are already signed in!";
        }

        return \Core\View::render('auth/sign-in.twig');
    }

    public function sign_out()
    {
        \Core\Session::session(['signed_in' => false]);
        $this->redirect('home.index');
    }

    public function do_auth()
    {
        $this->middleware(HasInputs::class, ['inputs' => 'password']);

        $setting = Settings::settings();

        if($setting->admin_pass === \Core\Input::get('password'))
        {
            \Core\Session::session(['signed_in' => true]);

            $this->redirect('home.index');
        }
        else
        {
            $this->redirect('home.index');
        }
    }
}
