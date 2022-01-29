<?php

use Illuminate\Support\Facades\{
    Route,
    App,
    Auth,
    URL
};
use App\Http\Livewire\Smasy\{
    Settings
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

Route::group(['prefix' => '{language}','middleware' => 'set.language'], function () {

    Route::get('/settings/users',[Settings::class,'users'])->name('settings.users');

    Route::middleware('auth')->group(function () {

        Route::get('/', function () {
            return view('welcome');
        })->name('home');


    });


    Auth::routes();
});

