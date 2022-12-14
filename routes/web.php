<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LangController;
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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->middleware(['locale', 'auth'])->name('home');

Route::get('/login', [UserController::class, 'login'])->middleware('locale')->name('login.form');
Route::post('/login', [UserController::class, 'postLogin'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register'])->middleware('locale')->name('register.form');
Route::post('/register', [UserController::class, 'postRegister'])->name('register');

Route::resource('users', UserController::class)->middleware(['locale', 'admin']);

Route::prefix('tasks')->name('tasks.')->controller(TaskController::class)->middleware('locale')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/create', 'create')->name('create');
    Route::get('/{task}', 'show')->name('show');
    Route::get('/{task}/edit', 'edit')->name('edit');
    Route::put('/{task}', 'update')->name('update');
    Route::delete('/{task}', 'destroy')->name('destroy');
});

Route::get('lang/{lang}',[LangController::class, 'changeLang'])->middleware('locale')->name('lang');
