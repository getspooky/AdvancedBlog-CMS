<?php

namespace App\Http\Controllers;

use App\Http\Requests\settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\settings as RequestSettings;

class DashboardUser extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get all User using pagination

        $user = User::OrderBy("id","desc")->paginate(10);

        return view("manage.pages.users",compact("user"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


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

        $this->authorize("edit",User::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestSettings $request, $id)
    {
        //
        $this->authorize("update",Auth::user());

        User::where('id',Auth::id())->update([
            "name"=>$request->get('name'),
            "email"=>$request->get('email'),
            "password"=>$request->get('password')
        ]);

        session()->flash("settings","Your Data has been updated successfully");

        return redirect()->route('settings');

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
        $this->authorize("delete",User::find($id));

        // destroy User by giving id

        $destroy = User::destroy($id);

        if(Auth::user() === $id){

            return redirect()->route("/");

        }else{

            return redirect()->route("Users.index");

        }


    }


    public function settings(){

        return view("manage.pages.settings");

    }




}
