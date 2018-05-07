<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\PaginationController;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        // $posts  =   Post::all();
        // return view('post.index')->with('posts',$posts);
        return PaginationController::page(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
                'title' => 'required|min:3|max:25',
                'content' => 'required|min:5',
                'category' => 'required',
                'image' => 'image|mimes:jpg,jpeg,gif,png|max:2048'
            ]);

        $img_name = null;

        if($request->image != null)
        {
            $img_name =   time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('upload'),$img_name);
        }

        Post::create([
                'title' =>  $request->input('title'),
                'category' =>  $request->input('category'),
                'content' =>  $request->input('content'),
                'user_id' =>  Auth::user()->id,
                'image' =>  $img_name,
            ]);
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('post.edit')->with('post',$post);
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
        //
        $this->validate($request,[
                'title' => 'required|min:3|max:25',
                'content' => 'required|min:5',
                'category' => 'required'
            ]);

        Post::where('id',$id)->update([
                'title' =>  $request->input('title'),
                'category' =>  $request->input('category'),
                'content' =>  $request->input('content')
            ]);
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::find($id)->delete();
        // return redirect('/post');
        return redirect()->back();
    }
}
