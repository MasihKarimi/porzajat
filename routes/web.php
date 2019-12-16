<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Support\Facades\Input;
date_default_timezone_set('Asia/Kabul');
ob_start();
session_start();


Route::group(['middleware'=>['web']],function () {
 //###########login route############
    Route::get('/',function (){
       return view('login');
    });
    Route::get('/login',function (){
        return view('login');
    });
    Route::get('/lo',function (){
        return view('login');
    });
    Route::post('/login', function () {

        $data = Input::All();
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:5'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }
        if ($rows = DB::table('users')->where('email', $data['email'])->where('state', '0')->first()) {
//        return Hash::make('1');
            if(password_verify($data['password'],$rows->password)){
                $_SESSION['access'] = $rows->id;
                return view('page.main_dashboard');
            }else{
                return view('login')->with('wrong', 'wrong');
            }
        } else {
            return view('login')->with('wrong', 'wrong');
        }
        return view('login');
    });
    Route::get('/logout',function (){
       session_destroy();
       return view('login');
    });
    if (!empty($_SESSION['access'])) {
        Route::get('/dash', function () {
            return view('page.main_dashboard');
        });
        include_once ('all_routes.php');

    }
    else
    {
        return view('login');
    }

});