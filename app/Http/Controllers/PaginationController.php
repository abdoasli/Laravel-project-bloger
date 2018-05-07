<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PaginationController extends Controller
{
    //

    public static function page($page)
    {
    	$perPage	=	3;

    	$n_posts	=	Post::all()->count();

    	$n_pages	=	ceil($n_posts/$perPage);

    	$posts  =   Post::forPage($page,$perPage)->get();
    	$active = $page;

        $group    =   ceil($active/3);

        //number of pages in the group
        $pg     =   ($n_pages-(($group-1)*3));
        $pg     =   ($pg>3)?3:$pg;

        $start  =   3*$group-2;
        // $end    =   3*$group;
        $end    =   $start-1+$pg;


        return view('post.index',compact('posts','n_pages','active','start','end'));
    }
}
