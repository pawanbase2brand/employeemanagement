<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Project\ProjectController;
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

Route::get('/norole', function () {
    return view('norole');
})->middleware(['auth'])->name('norole');

Route::group(['prefix'=>'roles', 'middleware' => ['role:Super Admin']], function () {
    Route::get('/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/assign-permission-to-role/{id?}', [RoleController::class, 'assignPermissionToRole'])->middleware(['role:Super Admin'])->name('roles.assignPermissionToRole');
    Route::post('/permissiontorole', [RoleController::class, 'permissionToRole'])->middleware(['role:Super Admin'])->name('roles.permissionToRole');
    Route::get('/delete/{id?}', [RoleController::class, 'destroy'])->middleware(['role:Super Admin'])->name('roles.destroy');
});
Route::group(['prefix'=>'permissions', 'middleware' => ['role:Super Admin']], function () {
    Route::get('/index', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/destroy/{id?}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
});
Route::group(['prefix'=>'users'], function () {
    Route::get('/index', [UserController::class, 'index'])->middleware(['role:admin|Super Admin', 'permission:view|edit|create|delete'])->name('users.index');
    Route::get('/role/{id?}', [UserController::class, 'create'])->middleware(['role:Super Admin'])->name('users.role');
    Route::post('/store', [UserController::class, 'store'])->middleware(['role:Super Admin'])->name('users.store');

});

Route::group(['prefix'=>'project', 'middleware' => ['role:project-cordinator|Super Admin']], function () {
    Route::get('/index', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
    Route::get('/store', [ProjectController::class, 'store'])->name('project.store');
});





require __DIR__.'/auth.php';
