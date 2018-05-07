<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
    	$this->validate($request,[
                'search' => 'required|min:1|max:25',
            ]);

    	$posts	=	null;

    	if(!empty($request->input('category')))
    	{
    		$posts	=	Post::where('title','like',"%".$request->input('search')."%")
    				->where('category',$request->input('category'));
    				// ->get();
    	}
    	else{
    		$posts	=	Post::where('title','like',"%".$request->input('search')."%");
    		// ->get();
    	}

    	// return view('post.search')->with('posts',$posts);
    	return $this->page(1,$posts);
    }

    public function searchPage(Request $request,$page)
    {
    	$this->validate($request,[
                'search' => 'required|min:1|max:25',
            ]);

    	$posts	=	null;

    	if(!empty($request->input('category')))
    	{
    		$posts	=	Post::where('title','like',"%".$request->input('search')."%")
    				->where('category',$request->input('category'));
    				// ->get();
    	}
    	else{
    		$posts	=	Post::where('title','like',"%".$request->input('search')."%");
    		// ->get();
    	}

    	// return view('post.search')->with('posts',$posts);
    	return $this->page($page,$posts);
    }

    public function page($page,$posts)
    {
    	$perPage	=	3;

    	$n_posts	=	$posts->count();

    	$n_pages	=	ceil($n_posts/$perPage);

    	$posts  =   $posts->forPage($page,$perPage)->get();
    	$active = $page;

        $group    =   ceil($active/3);

        //number of pages in the group
        $pg     =   ($n_pages-(($group-1)*3));
        $pg     =   ($pg>3)?3:$pg;

        $start  =   3*$group-2;
        // $end    =   3*$group;
        $end    =   $start-1+$pg;

        return view('post.search',compact('posts','n_pages','active','start','end'));
    }
}
