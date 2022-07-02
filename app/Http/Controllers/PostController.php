<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $posts = Post::all();
        return view('show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post -> content = $request -> content;
        
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts', $filename);
            $post->image=$filename;

        } else
        {
            $post->image = '123.jpg';
        }
        $post->user_id = Auth::user()->id;
        $post->created_by = $request->name;
        $post->save();

        return redirect()->route('posts.index')->with('message', 'post added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::findOrFail($id);
        return view('showOne')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('update')->with('post',$post);
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
        
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post -> content = $request -> content;
        
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts', $filename);
            $post->image=$filename;

        } else
        {
            $post->image = '123.jpg';
        }
        $post->user_id = Auth::user()->id;
        $post->created_by = $request->name;
        $post->save();

        return redirect()->route('posts.index')->with('message', 'post updated successfully');
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
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'post deleted successfully');
    }
}
