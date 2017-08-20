<?php namespace App\Middleware;

class IsAdmin extends \Core\Middleware
{
    public function error_message()
    {
        return "You are not allowed to view that page. You must be signed in!";
    }

    public function run() : bool
    {
        if(\Core\Session::has('signed_in') == false) return false;
        if(\Core\Session::session('signed_in') == false) return false;

        return true;
    }
}
