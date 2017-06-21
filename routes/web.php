<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('activation/{token}', function ($token)
{
    $user = App\User::where('activation_token', $token)->first();

    if ($user) {
        $user->activated_at = \Carbon\Carbon::now();
        $user->save();

        return 'Your account has been activated.';
    }

    return 'Invalid activation token.';
});
