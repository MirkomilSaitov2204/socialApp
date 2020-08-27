<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $posts = $this->post->getAllPosts();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.craete-edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required',
            'detail'     =>  'required',
            'image'     =>  'image'
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($image, PATHINFO_FILENAME);
            $new_name = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$new_name;
            $path = $request->file('image')->storeAs('public/postImage', $fileNameToStore);


        }else{
            $fileNameToStore = 'default.jpg';
        }



        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->iso_code = $request->iso_code;
        $post->is_active = $request->is_active;
        $post->image = $fileNameToStore;


        $post->save();


        Session::flash('success','Post Successfully Created');
        return redirect()->route('post.index');
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('admin.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::where('id', $id)->first();

        return view('admin.posts.craete-edit')->with('post', $post);
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
        $this->validate($request, [
            'title'=>'required',
            'image'=>'image',
        ]);
        $post = Post::findOrFail($id);

        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($image, PATHINFO_FILENAME);
            $new_name = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$new_name;
            $path = $request->file('image')->storeAs('public/postImage', $fileNameToStore);


        }
        
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->iso_code = $request->iso_code;
        $post->is_active = $request->is_active;
        if($request->hasFile('image')){
            $post->image = $fileNameToStore;
        }

        $post->save();

        Session::flash('success','Post Successfully Updated');
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success','Post Successfully Deleted');
        return redirect()->route('post.index');

    }

}
