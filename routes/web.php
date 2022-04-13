<?php

use Illuminate\Support\Facades\{
    Route,
    App,
    Auth,
    URL
};
use App\Http\Livewire\Smasy\{
    ListUsers,
    NewUser,
    Users
};
use App\Http\Livewire\Smasy\User\{
    AccessRules,
};

URL::defaults(['language' => app('getClientLanguage')]);

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

Route::redirect('/', App::currentLocale());

Route::group(['prefix' => '{language}',], function () {
    Route::middleware('auth')->group(function () {

         //Home
         Route::get('/', function () {
             return view('welcome');
         })->name('home');

        //Settings
        Route::group(['prefix' => '/settings',], function () {
            Route::get('/', function () {
                return view('welcome');
            })->name('home');
            //Users
            Route::group(['prefix' => '/users',], function () {
                Route::get('/access-rules', AccessRules::class)->name('user.access-rules');
                Route::get('/', Users::class);
            });
        });
    });


    Auth::routes();
});
