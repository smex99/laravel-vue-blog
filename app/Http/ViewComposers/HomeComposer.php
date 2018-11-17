<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Comment;
Use App\Post;

class HomeComposer
{
    /**
     * HomeComposer constructor.
     */
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $view->with('posts', Post::ownerPost())            
            ->with('comments', Comment::ownerComment());
    }
}