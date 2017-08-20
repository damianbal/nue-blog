<?php

namespace App\Controllers;
use App\Middleware\HasInput;
use App\Models\Post;
use Core\Database\QueryBuilder;
use Core\Utils;


class HomeController extends Controller
{
    /**
     * Display posts
     *
     */
    public function index()
    {
        //$all_posts = Post::builder()->where(['is_page' => false])->orderBy('created_at', 'DESC')->get();
        $all_posts = Post::posts()->orderBy('created_at', 'DESC')->get();
        $all_pages = Post::pages()->orderBy('created_at', 'ASC')->get();

        return \Core\View::render('post/index.twig', [
            'posts' => $all_posts,
            'admin' => @\Core\Session::session('signed_in'),
            'pages' => $all_pages
        ]);
    }
}
