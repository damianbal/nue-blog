<?php

/**
 * Here you can inject global data to Views, add any other routes you wish to add.
 *
 */

namespace App;
use Core\View;
use Core\Application as CoreApp;
use App\Models\Settings;

class Application extends CoreApp
{
    public static function register()
    {
        \Core\View::set('blog_title', Settings::find(1)->title);
        \Core\View::set('settings', Settings::find(1));
    }
}
