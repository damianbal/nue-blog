<?php

/**
 * Define routes here
 */

/**
 * Home
 */
$router->get('home.index', 'HomeController', 'index');


/**
 * Post
 */
$router->group('post', 'PostController')
        ->get('show', 'show')
        ->get('remove', 'remove')
        ->post('add', 'add')
        ->get('edit_show', 'edit_show')
        ->post('edit', 'edit');

/**
 * Auth
 */
$router->get('auth.sign_in', 'AuthController', 'sign_in');
$router->get('auth.sign_out', 'AuthController', 'sign_out');
$router->post('auth.do_auth', 'AuthController', 'do_auth');


/**
 * Admin
 */
$router->group('admin', 'AdminController')
       ->get('index', 'index')
       ->post('update_settings', 'update_settings')
       ->post('update_theme', 'update_theme');
