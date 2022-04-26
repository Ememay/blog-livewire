<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Includes\Article;
use App\Http\Livewire\Includes\Search;
use App\Http\Livewire\Index\Index;
use Illuminate\Support\Facades\Auth;
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


/*main page*/
Route::get('/',Index::class);

/*article*/
Route::get('blog/{id}',Article::class);

/*login*/
Route::get('login',Login::class);

/*register*/
Route::get('register',Register::class);

/*logout*/
Route::get('logout',function(){
    Auth::logout();
    return redirect()->to('/');
});


/*search*/
Route::get('search/{catId}/{char?}',Search::class);

