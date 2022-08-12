<?php

use App\Http\Controllers\confessionsController;
use App\Models\Confessions;
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

Route::get('/', [confessionsController::class, "index"])->middleware("guest");

Route::get('/home', [confessionsController::class, "show"])->name("home");

Route::post('/confessions/create', [confessionsController::class, "create"])->name('create');
Route::patch('/confessions/edit/{id}', [confessionsController::class, "update"]);

Route::delete('/confessions/delete/{id}', [confessionsController::class, "destroy"]);

require __DIR__ . '/auth.php';
Route::get('/confessions', [confessionsController::class, "confessions"])->name('confessions');
