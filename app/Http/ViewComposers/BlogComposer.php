<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
Use App\Post;

class BlogComposer
{
    /**
     * BlogComposer constructor.
     */
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $view->with('posts', Post::paginate(9));
    }
}