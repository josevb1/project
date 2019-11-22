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
    return view('user-management/auth/register');
});

Auth::routes();

if(config('laravel_user_management.auth.enable'))
    {
        /// USER AUTH
        Route::group([
            'namespace'     => 'App\Http\Controllers\UserManagement\Auth',
            'as'            => 'auth.user.',
            'middleware'    => ['web', 'guest']
        ], 
        function () {

            // auth.user.login
            Route::get(config('laravel_user_management.auth.login_url'), 'AuthController@loginForm')
                ->name('login');

            // auth.user.login
            Route::post(config('laravel_user_management.auth.login_url'), 'AuthController@login')
                ->name('login');

            // auth.user.register
            Route::get(config('laravel_user_management.auth.register_url'), 'AuthController@registerForm')
                ->name('register');

            // auth.user.register
            Route::post(config('laravel_user_management.auth.register_url'), 'AuthController@register')
                ->name('register');
                
        });
        

        ///////////////////
        Route::group([
            'namespace'     => 'App\Http\Controllers\UserManagement\Auth',
            'as'            => 'auth.user.',
            'middleware'    => ['web', 'auth']
        ],
        function(){

            // auth.user.logout
            Route::get(config('laravel_user_management.auth.logout_url'), 'AuthController@logout')
                ->name('logout');

        });
            
    }