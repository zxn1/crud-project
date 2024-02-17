<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentProfileController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
    Route::get('/', [StudentProfileController::class, 'index'])->name('index'); //arah = students/    nama = students.index
    Route::get('/create', [StudentProfileController::class, 'create'])->name('create');
    Route::post('/store', [StudentProfileController::class, 'store'])->name('store');
    Route::get('/{student}/edit', [StudentProfileController::class, 'edit'])->name('edit');
    Route::put('/{student}/update', [StudentProfileController::class, 'update'])->name('update');
    Route::delete('/{student}/destroy', [StudentProfileController::class, 'destroy'])->name('destroy');
    Route::get('/{student}/show', [StudentProfileController::class, 'show'])->name('show');
    Route::get('/graph', [StudentProfileController::class, 'graph'])->name('graph');
});
