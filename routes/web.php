<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

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
    $datetime1 = new DateTime('2022-08-06');
    $datetime2 = new DateTime('now');
    $interval = $datetime1->diff($datetime2);
    $days =  $interval->format('%a days');
	return view('ap',['days'=>$days]); 
    
});

