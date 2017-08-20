<?php
use Core\Database\Database;
use App\Models\Post;
use App\Models\Page;

/**
 * Setup your tables here
 * db directory should be removed in production!
 */

// settings
Database::createTableForModel(App\Models\Settings::class, [
    'title' => 'My blog',
    'admin_pass' => 'admin', // change this after installation!
    'styles' => '',
    'author' => "Blog's admin",
], true);

// posts
Database::createTableForModel(App\Models\Post::class, [
    'title' => 'My first post',
    'content' => 'Welcome to my first blog!',
    'featured' => FALSE,
    'is_page' => FALSE,
    'views' => 0,
], true);

// add page
Database::createTableForModel(App\Models\Post::class, [
    'title' => 'My page',
    'content' => '<h4>This is some page!</h4>',
    'featured' => FALSE,
    'is_page' => TRUE,
    'views' => 0,
], true);
