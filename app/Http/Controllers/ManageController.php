<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    //

    public function Index(){

        return $this->Dashboard();

    }


    /*
     *  Route = /manage/Dashboard
     *  return Dashboard view
     *
    */

    public function Dashboard(){

        /*  get 5 lasted POST  */

        $post = Post::OrderBy('id','desk')->limit(4)->get();

        /*  get 5 lasted notifications  */

        $notification = Auth::user();

        return view('manage.pages.index',[
            "post"=>$post,
            "notification"=>$notification
        ]);



    }


}
