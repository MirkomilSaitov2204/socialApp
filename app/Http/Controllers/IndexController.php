<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

     /**
    * @var \App\Models\Post
    */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->getAllPostsWithStatus();
            return view('front.index', compact('posts'));
    }

    public function single($title)
    {
        $post = Post::where('title', $title)->first();

        return view('front.single', compact('post'));
    }
}
