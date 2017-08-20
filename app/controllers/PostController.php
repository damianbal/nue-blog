<?php namespace App\Controllers;
use App\Models\Post;
use App\Middleware\IsAdmin;

class PostController extends Controller
{
    /**
     *
     */
    public function remove()
    {
        $this->middleware(IsAdmin::class);

        $post = \App\Models\Post::find(\Core\Input::get('id'));

        $post->delete();

        //$this->redirect('home.index');
        $this->redirect_back();
    }

    /**
     * Show
     */
    public function show()
    {
        $post = Post::find(\Core\Input::get('id'));

        // update number of views
        $post->views = $post->views + 1;
        $post->save(false);

        return \Core\View::render('post/show.twig', ['post' => $post]);
    }

    /**
     * Edit
     */
    public function edit_show()
    {
        $this->middleware(IsAdmin::class);

        $this->middleware(IsAdmin::class);
        $post = Post::find(\Core\Input::get('id'));
        return \Core\View::render('post/edit.twig', ['post' => $post]);
    }

    /**
     *
     */
    public function edit()
    {
        $this->middleware(IsAdmin::class);

        $post = Post::find(\Core\Input::get('id'));

        $new_title = \Core\Input::get('title');
        $new_content = \Core\Input::get('content');

        $post->title = $new_title;
        $post->content = $new_content;
        $post->save();
        $this->redirect('admin.index');
    }

    /**
     *
     */
    public function add()
    {
        $this->middleware(IsAdmin::class);

        $is_page = FALSE;

        if(\Core\Input::get('is_page') == "1")
        {
            $is_page = TRUE;
        }

        $post = \App\Models\Post::create([
            'title' => \Core\Input::get('post_title'),
            'content' => \Core\Input::get('post_content'),
            'featured' => FALSE,
            'is_page' => $is_page,
            'is_in_nav' => FALSE,
        ]);

        $this->redirect_back();
    }
}
