<?php namespace App\Controllers;
use App\Middleware\IsAdmin;
use App\Models\Settings;

class AdminController extends Controller
{
    //
    public function checkForAdmin()
    {
        $this->middleware(IsAdmin::class);
    }

    // index
    public function index()
    {
        $this->checkForAdmin();

        $settings = Settings::settings();
        $posts = \App\Models\Post::all();
        $pages = \App\Models\Post::pages()->get();

        return \Core\View::render('admin/index.twig', [
            'settings' => $settings,
            'posts' => $posts,
            'pages' => $pages
        ]);
    }

    public function update_theme()
    {
        $this->checkForAdmin();
        $new_css = \Core\Input::get('css');

        $settings = Settings::settings();

        $settings->styles = $new_css;
        $settings->save();
        $this->redirect_back();
    }

    //
    public function update_settings()
    {
        $this->checkForAdmin();
        $this->middleware(\App\Middleware\HasInputs::class, ['inputs' => ['blog_title']]);

        $settings = Settings::settings();

        $new_title = \Core\Input::get('blog_title');
        $new_pass = \Core\Input::get('admin_pass');

        $settings->title = $new_title;
        $settings->admin_pass = $new_pass;
        $settings->save();

        $this->redirect_back();
    }

}
