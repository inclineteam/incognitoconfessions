<?php

use App\Http\Controllers\landingconfessionsController;
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

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

require __DIR__ . '/auth.php';

Route::get('/', [landingconfessionsController::class, "index"]);
Route::get('/confessions', [landingconfessionsController::class, "confessions"]);