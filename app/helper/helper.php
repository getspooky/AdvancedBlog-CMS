<?php

use Jenssegers\Date\Date;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/11/18
 * Time: 17:16
 */

 /*
  *
  *  @return bool
  *
  *  return if the current user is admin
  *
  */

 function isSuper(){

     return \Illuminate\Support\Facades\Auth::user()->role === "admin";

 }

 /*
  *
  *  @return string
  *
  *   returns the part of the post between the 0 and end 100,
  *
  */

 function isSlice($string){

     return substr($string,0,100)."...";

 }


 /*
  *
  *  @return A formatted version of number
  *
  *  return the number of users
  *
  */

  function isUserCount()
  {

      $User_count = \App\User::find(\Illuminate\Support\Facades\Auth::id())->count();

      if (!is_null($User_count)){

          if ($User_count >= 1000) {

              return number_format($User_count / 1000, 1) . "K";

          } else {

              return $User_count;

          }

      }else{

          return 0;

      }

  }


  /*
  *
  *  @return A formatted version of number
  *
  *  return the number of Posts
  *
  */

  function isPostCount(){

    $Post_count = \App\Post::where('user_id',\Illuminate\Support\Facades\Auth::id())->get()->count();

      if (!is_null($Post_count)) {

          if ($Post_count >= 1000) {

              return number_format($Post_count / 1000, 1) . "K";

          } else {

              return $Post_count;

          }

      }else{

          return 0;

      }


  }



  function notification(){

      return count(\Illuminate\Support\Facades\Auth::user()->unreadNotifications);

  }

  /*
   * All information about useer (name,email,created_at,image ..)
   *
   */

   function user(){

       return \Illuminate\Support\Facades\Auth::user();

   }

   /*
    *
    *  Date Get a human readable output (alias for diffForHumans):
    *
    */

   function diffForHumans($date){

     $date = new Date($date);

     return $date->ago();


   }


?>