<?php

use App\Http\Controllers\Backend\AuthController;
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
Route::get('', [\App\Http\Controllers\Controller::class, 'index'])->name("welcome");
Route::get('/auth/login', [AuthController::class, 'login'])->name("login");
Route::get('/auth/register', [AuthController::class, 'register'])->name("register.index");
Route::post('/auth/register', [AuthController::class, 'add'])->name("register.add");

Route::post('/auth/login', [AuthController::class, 'loginPage'])->middleware('web')->name("loginPage");

Route::group(['middleware' => ['auth:sanctum']],function (){

    Route::get("/logout",[AuthController::class, 'logout'])->name('logout');

    Route::get('/admin', [\App\Http\Controllers\Backend\DefaultController::class, 'index'])->name("admin.index");

    Route::prefix('/admin')->group(function (){
        Route::get('', [\App\Http\Controllers\Backend\DefaultController::class, 'index'])->name("admin.index");
        Route::get('/settings', [\App\Http\Controllers\Backend\SettingsController::class, 'index'])->name("settings.index");
        Route::post('/settings/sortable', [\App\Http\Controllers\Backend\SettingsController::class, 'sortable'])->name("settings.sortable");
        Route::get('/settings/delete/{id}', [\App\Http\Controllers\Backend\SettingsController::class, 'delete'])->name("settings.delete");
        Route::get('/settings/edit/{id}', [\App\Http\Controllers\Backend\SettingsController::class, 'edit'])->name("settings.edit");
        Route::post('/settings/update/{id}', [\App\Http\Controllers\Backend\SettingsController::class, 'update'])->name("settings.update");
    });

    Route::prefix('/users')->group(function (){
        Route::get('', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name("users.index");
        Route::get('/add', [\App\Http\Controllers\Backend\UserController::class, 'add'])->name("users.add");
        Route::post('/add', [\App\Http\Controllers\Backend\UserController::class, 'addItem'])->name("users.addItem");
        Route::get('/detail/{id}', [\App\Http\Controllers\Backend\UserController::class, 'detail'])->name("users.detail");
        Route::post('/sortable', [\App\Http\Controllers\Backend\UserController::class, 'sortable'])->name("users.sortable");
        Route::get('/delete/{id}', [\App\Http\Controllers\Backend\UserController::class, 'delete'])->name("users.delete");
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\UserController::class, 'edit'])->name("users.edit");
        Route::post('/update/{id}', [\App\Http\Controllers\Backend\UserController::class, 'update'])->name("users.update");
    });

    Route::prefix('/training')->group(function (){
        Route::get('', [\App\Http\Controllers\Backend\TrainingController::class, 'index'])->name("training.index");
        Route::get('/add', [\App\Http\Controllers\Backend\TrainingController::class, 'add'])->name("training.add");
        Route::post('/add', [\App\Http\Controllers\Backend\TrainingController::class, 'addItem'])->name("training.addItem");
        Route::get('/detail/{id}', [\App\Http\Controllers\Backend\TrainingController::class, 'detail'])->name("training.detail");
        Route::get('/delete/{id}', [\App\Http\Controllers\Backend\TrainingController::class, 'delete'])->name("training.delete");
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\TrainingController::class, 'edit'])->name("training.edit");
        Route::post('/update/{id}', [\App\Http\Controllers\Backend\TrainingController::class, 'update'])->name("training.update");
    });
});



