<?php

namespace App\Http\Controllers;

use App\Notifications\LaraNotification;
use App\Notifications\Notifications;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Http\Requests\Status as RequestStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use App\Jobs\PostQueue;

class Status extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $Status = \App\Post::OrderBy("id","Desc")->paginate(20);

        return view("manage.pages.status",compact("Status"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $StatusAuth = User::find(Auth::id())->posts;

        return view("manage.pages.statusManage",compact("StatusAuth"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStatus $request)
    {

        $insert = Post::insert([

            "content"=>$request->get("content"),
            "user_id"=>Auth::id()

        ]);

        session()->flash("message","Your post has been published successfully");

        Notification::send(User::all(),new Notifications("Has Published a new Post"));


        return redirect()->route('Status.index');

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

        $destroy =  Post::destroy($id);

        return redirect()->route('Status.create');

    }

}
