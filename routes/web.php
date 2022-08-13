<?php

use App\Http\Controllers\ConfessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UpdateCredentialsController;
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

//  Show landing page
Route::get('/', [LandingController::class, "index"])->middleware("guest");

// Show home page
Route::get('/home', [HomeController::class, "show"])->name("home");

// Show confessions page
Route::get('/confessions', [ConfessionController::class, "index"])->name('confessions');

// Show edit credentials page
Route::get('/profile/show', [UpdateCredentialsController::class, "show"])->name('profile.show');
// Show edit credentials page
Route::put('/profile/edit', [UpdateCredentialsController::class, "update"])->name('profile.edit');

// Show create confession form
Route::get('/confessions/create', [ConfessionController::class, "create"])->name('confession.create');

// Store confession in database
Route::post('/confessions/create', [ConfessionController::class, "store"]);

// Show edit confession form
Route::get('/confessions/{confession}/edit', [ConfessionController::class, "edit"]);

// Edit confession
Route::put('/confessions/{confession}/edit', [ConfessionController::class, "update"]);

// Delete confession
Route::delete('/confessions/{confession}/delete', [ConfessionController::class, "destroy"]);

require __DIR__ . '/auth.php';
