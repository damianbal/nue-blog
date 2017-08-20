<?php

namespace App\Models;

class Post extends \Core\Model
{
    public static $table = 'posts';

    /**
     * Returns posts which are pages.
     * @static
     */
    public static function pages()
    {
        return Post::builder()->where(['is_page' => TRUE]);
    }

    /**
     * Posts
     *
     */
    public static function posts()
    {
        return Post::builder()->where(['is_page' => FALSE]);
    }
}
