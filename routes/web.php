<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix'=>'roles', 'middleware' => ['role:Super Admin']], function () {
    Route::get('/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
});

Route::group(['prefix'=>'users'], function () {
    Route::get('/index', [UserController::class, 'index'])->middleware(['role:admin|Super Admin'])->name('users.index');
    Route::get('/role/{id?}', [UserController::class, 'create'])->middleware(['role:Super Admin'])->name('users.role');
    Route::post('/store', [UserController::class, 'store'])->middleware(['role:Super Admin'])->name('users.store');

});





require __DIR__.'/auth.php';
