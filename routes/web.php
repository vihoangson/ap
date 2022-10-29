<?php

use App\Models\Message;
use App\Services\RouteService;
use Illuminate\Support\Facades\Auth;
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
Route::get('/lock', function () {
    return view('lock');
});
Route::get('/content', function () {
    return RouteService::content();
});

Route::get('/chat', function () {
    $ms = Message::all();

    return view('chat', ['ms' => $ms]);
})
     ->middleware(\App\Http\Middleware\BasicAuth::class);

Route::get('/logins', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('loginbasic');
    return redirect('/chat');
});
Route::post('/logins', function (Request $request) {
    if ($request->input('password') === config('app.password_app')) {
        Session::put('loginbasic', 'ok');

        return redirect('/chat');
    } else {
        return redirect('/logins');
    }
});
Route::get('/voice', function (Request $request) {
    return view('voice');
});

Auth::routes();
// Route::get('/register', function(){});
// Route::post('/register', function(){});
Route::get('password/reset', function () { });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
     ->name('home');
Route::get('/flush', function () {
    \Illuminate\Support\Facades\Artisan::call('session:flush');

    return redirect('/');
});

Route::resource('media', \App\Http\Controllers\MediaController::class)->middleware(\App\Http\Middleware\BasicAuth::class);;
