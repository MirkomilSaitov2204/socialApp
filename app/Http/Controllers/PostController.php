<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
    * @var \App\Models\Post
    */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.craete-edit');
    }

}
