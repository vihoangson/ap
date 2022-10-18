<?php

use App\Models\Message;
use App\Services\RouteService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

Route::get('/add-feed', function () {
    return view('addfeed');
});
Route::get('/feeds', function () {
    return view('feeds');
});
Route::get('/', function () {

    if (Cache::has('pass')) {
        $datetime1 = new DateTime('2022-08-05 19:00:00');
        $datetime2 = new DateTime('now');
        $interval  = $datetime1->diff($datetime2);
        $days      = $interval->format('%a');

        return view('ap', ['days' => $days]);
    } else {
        return redirect('/password');
    }

});

Route::get('/password', function (Request $request) {
    return view('pass');
});
Route::post('/password', function (Request $request) {
    $password = $request->input('password');
    if ($password == config('app.password_app', 1234)) {
        Cache::put('pass', 'ok', 3);
        return redirect('/');
    }
    return redirect('/password');
});

Route::get('/content', function () {
    return RouteService::content();
});

Route::get('/chat', function () {
    $ms = Message::all();
    return view('chat', ['ms' => $ms]);
})->middleware(\App\Http\Middleware\BasicAuth::class);

Route::get('/login', function () {
    return view ('login');
});
Route::get('/logout', function () {
    Session::forget('loginbasic');
    return redirect('/login');

});
Route::post('/login', function (Request $request) {
    if($request->input('password') === config('app.password_app')){
        Session::put('loginbasic','ok');
        return redirect('/chat');
    }else{
        return redirect('/login');
    }
});
