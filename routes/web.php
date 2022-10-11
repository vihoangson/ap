<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function (){

    if(Cache::has('pass')){
        $datetime1 = new DateTime('2022-08-06');
        $datetime2 = new DateTime('now');
        $interval = $datetime1->diff($datetime2);
        $days =  $interval->format('%a days');
        return view('ap',['days'=>$days]); 
    }else{
        return redirect('/password');
    }
    
});

Route::get('/password', function (Request $request){

    return view('pass'); 
});
Route::post('/password', function (Request $request){
    $password = $request->input('password');    
    if($password == 1234){
        Cache::put('pass','ok',5);
        return redirect('/');
    }
    return redirect('/password');

});

