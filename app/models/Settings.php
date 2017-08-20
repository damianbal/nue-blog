<?php

namespace App\Models;

class Settings extends \Core\Model
{
    public static $table = 'settings';

    /**
     * @static
     * @return \App\Models\Settings
     */
    public static function settings() : Settings
    {
        return Settings::find(1);
    }
}
