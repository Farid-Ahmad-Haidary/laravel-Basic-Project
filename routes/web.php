<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students' , [studentController::class, 'index'])->name('students');
Route::get('/create', [studentController::class, 'create'])->name('createstudent');
Route::post('/store', [studentController::class, 'store'])->name('storestudent');