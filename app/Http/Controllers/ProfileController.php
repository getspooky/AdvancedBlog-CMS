<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    /*
     *
     * Image Profile Storage
     *
     */

    public function UploadImage(Request $request){

        $name_of_file = str_random(10)."_user_".Auth::id();

        $extension = $request->file('avatar')->getClientOriginalExtension();

        $path = $request->file('avatar')->storeAs(
            'avatars', $name_of_file.".".$extension
        );

        User::where('id',Auth::id())->update([
            "image"=>$name_of_file.".".$extension
        ]);

        return redirect()->route('account::index');

    }

    /*
     *
     *  Account page
     *
     */

    public function index(){

        return view("manage.pages.account",[
            "user"=>Auth::user()
        ]);

    }


}
