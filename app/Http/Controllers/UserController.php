<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Test;

use App\User;

use App\Cv;

use App\Emploi;

use App\Notification;

use Auth;

use Image;

class UserController extends Controller
{

  public function index(){

      $user = User::paginate(6);

      return  view('user.index',['users' => $user]);

  }


  //permet d'afficher les details d'emploi
  public function profile ($userId){

    if (Auth::user()->is_admin == 1 ){

      $user = User::find($userId);

      $cv =Cv::paginate(4);

      $emploi = Emploi::paginate(4);

      $us =User::paginate(4);
    }

    if (Auth::user()->is_admin == 0 ){

      $cv = $user->cvs()->orderBy('created_at','desc')->paginate(4);

      $emploi =$user->emplois()->orderBy('created_at','desc')->paginate(4);

      $us =User::paginate(4);

    }

    $notification =$user->notifications()->paginate(4);

          $test = Test::paginate(4);

    return view('user.profile',['user' => $user ,'users' => $us , 'cvs' => $cv ,'tests' => $test , 'notifications' => $notification, 'emplois' => $emploi]);

  }

  public function profiles (){

    $user = Auth::user();

    if (Auth::user()->is_admin == 1 ){

      $cv =Cv::paginate(4);

      $emploi = Emploi::paginate(4);

      $us =User::paginate(4);
    }

    if (Auth::user()->is_admin == 0 ){

      $cv = $user->cvs()->orderBy('created_at','desc')->paginate(4);

      $emploi =$user->emplois()->orderBy('created_at','desc')->paginate(4);

      $us =User::paginate(4);

    }

          $notification =$user->notifications()->paginate(4);

                $test = Test::paginate(4);


    return view('user.profile',['user' => $user ,'users' => $us ,  'notifications' => $notification, 'cvs' => $cv ,'tests' => $test , 'emplois' => $emploi]);


  }

  public function update_image (Request $request){

    $user = Auth::user();

    $user = User::find($user->id);

    $cv = $user->cvs()->orderBy('created_at','desc')->paginate(6);

    $emploi =$user->emplois()->orderBy('created_at','desc')->paginate(6);

    $test =$user->tests()->paginate(6);

    $notification =$user->notifications()->paginate(6);

    $us =User::paginate(6);

    if($request->hasFile('avatar')){
      $avatar=$request->file('avatar');
      $filename=time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300,300)->save( public_path('/'.$filename));

      $user = Auth::user();
      $user->avatar = $filename;
      $user->save();
     }
     return view('user.profile',['user' => $user ,'users' => $us ,  'notifications' => $notification, 'cvs' => $cv ,'tests' => $test , 'emplois' => $emploi]);
  }

}
