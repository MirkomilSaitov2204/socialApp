<?php

namespace App\Http\Controllers;

use Session;
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
        return view('admin.post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('name', '==', 'administrator')->get();

        if($role){
            $roles = Role::all();
            $user = User::where('id', $id)->with('roles')->first();

            return view('admin.users.create-edit')->with('user', $user)
                                                  ->with('roles', $roles);
        }

        $roles = Role::where('name', '!=' ,'administrator')->get();
        $user = User::where('id', $id)->with('roles')->first();

        return view('admin.users.create-edit')->with('user', $user)
                                              ->with('roles', $roles);
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
            'name'=>'required',
            'email'=>'required',
        ]);
        $user = User::findOrFail($id);

        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($image, PATHINFO_FILENAME);
            $new_name = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$new_name;
            $path = $request->file('image')->storeAs('public/userImage', $fileNameToStore);


        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->hasFile('image')){
            $user->image = $fileNameToStore;
        }

        $user->save();
        // $user->roles()->attach($request->roles);
        $user->syncRoles($request->input('roles'));

        Session::flash('success','User Successfully Updated');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('success','User Successfully Deleted');
        return redirect()->route('user.index');

    }

}
