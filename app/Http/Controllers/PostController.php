<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NewPost;
use App\User;
use App\Post;
use App\Comment;
use App\Category;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(9);
        return view('post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create')
            ->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120',
            'content' => 'required|max:5000',
            'live' => 'required',
            'image' => 'required|image',
        ]);

        try {
            $filename = time().'.'.$request->image->extension();
            $path = $request->image->storeAs('public', $filename);

            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->live = (boolean) $request->live;
            $post->image = $filename;
            $post->save();

            $post->categories()->sync($request->categories, false);

            $users = User::all();
            foreach ($users as $user) {
                $user->notify(new NewPost($post));
            }
            $message = 'Article créé avec succée';
        }
        catch(Exception $e) {
            $message = 'Article création erreur';
        }
        return redirect('/home')->with(['message'=> $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findorFail($id);
        return view('post.show', compact('post'))
            ->with('comments', Comment::where('post_id', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('post.edit', compact('post'))
            ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $filename = time().'.'.$request->image->extension();
            $path = $request->image->storeAs('public', $filename);
            
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->content = $request->content;
            $post->live = (boolean) $request->live;
            $post->image = $filename;
            $post->update();

            $post->categories()->sync($request->categories);
            $message = 'Article sauvegardé avec succée';            
        }
        catch (Exception $e){
            $message = 'Article sauvegarde erreur';
        }
        return redirect('/home')->with(['message'=> $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Storage::deleteDirectory($post->image);
        $post->delete();
        return redirect('/post');
    }

    /**
     * Search for posts
     *
     * @param  request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(request $request)
    {
        $posts = Post::search($request["search"])->get();
        return view('post.search', compact('posts'));
    }
}
