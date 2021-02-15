<?php

use App\Http\Controllers\ContactController;
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
Route::prefix('contacts')->group(function () {
Route::get('/', [ContactController::class, 'index'])->name('con.index');
Route::get('/create', [ContactController::class, 'loadCreatePage'])->name('con.create');
Route::post('/', [ContactController::class, 'store']);
Route::get('/{contact}/edit', [ContactController::class, 'edit'])->where(['id' => '[0-9]+']);
Route::put('/{contact}', [ContactController::class, 'update'])->where(['id' => '[0-9]+']);
Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('con.del');
});;


