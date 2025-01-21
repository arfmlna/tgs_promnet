<?php

use App\Http\Controllers\PreTest1;
use App\Http\Controllers\PreTest2;
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

Route::get('/', [PreTest1::class, 'index'])->name('pretest1');
Route::post('/', [PreTest1::class, 'usiaku'])->name('pretest1.usiaku');

Route::get('pretest2', [PreTest2::class, 'index'])->name('pretest2');
Route::get('pretest2_specific/{id}', [PreTest2::class, 'specific'])->name('pretest2_specific');
Route::post('pretest2', [PreTest2::class, 'create'])->name('pretest2.create');
Route::put('pretest2', [PreTest2::class, 'edit'])->name('pretest2.edit');
Route::delete('pretest2/{id}', [PreTest2::class, 'delete'])->name('pretest2.delete');

