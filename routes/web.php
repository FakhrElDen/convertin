<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

require __DIR__.'/auth.php';

Route::group(['prefix' => 'tasks', 'middleware' => 'role:admin'], function() {
    Route::get('/', [TaskController::class, 'index'])->name('tasks');
    Route::get('/create', [TaskController::class, 'create'])->name('create-task');
    Route::post('/store', [TaskController::class, 'store'])->name('store-task');
    Route::get('/statistics', [TaskController::class, 'statistics'])->name('statistics');
});