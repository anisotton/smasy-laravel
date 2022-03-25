<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\{
    Route,
    App,
    Auth,
    URL
};
use App\Http\Livewire\Smasy\{
    Settings,
    User
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
                Route::get('/', [UserController::class, 'users'])->name('user.list');
                Route::get('/new', [UserController::class, 'new'])->name('user.new');
                Route::get('/access-rules', AccessRules::class)->name('user.access-rules');
                Route::post('/new', [UserController::class, 'store'])->name('user.store');
                Route::get('/edit/{id}', [UserController::class, 'update'])->name('user.update');
                Route::get('/active/{id}', [UserController::class, 'updateActive'])->name('user.active');
            });
        });
    });


    Auth::routes();
});
