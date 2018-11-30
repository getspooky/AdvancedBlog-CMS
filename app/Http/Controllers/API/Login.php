<?php

namespace App\Http\Controllers\API;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class Login extends Controller
{

    public function LoginValidator(Request $request)
    {

        $valide = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if($valide->fails()){

            return \response()->json($valide->errors());

        }

        $credentials = $request->only('email', 'password');

        if(!$token = JWTAuth::attempt($credentials)){

            return response()->json(["error"=>"invalid Username or password"]);

        }

        return  \response()->json($token);

    }

}
