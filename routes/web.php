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

// show about page
Route::get('/about', [LandingController::class, "about"])->name("about");

// show privacy page
Route::get('/privacy', [LandingController::class, "privacy"])->name("privacy");

// redirect discord
Route::get('/discord', [LandingController::class, "discord"])->name("discord");

// redirect bug report
Route::get('/report', [LandingController::class, "discord"])->name("report");

// redirect to source code github
Route::get('/source', [LandingController::class, "source"])->name("source");

// show cookie page
Route::get('/cookie', [ConfessionController::class, "cookie"])->name("cookie");

// --------------------------------------------------------------

// Show home page
Route::get('/home', [HomeController::class, "show"])->name("home");

// Show confessions page
Route::get('/confessions', [ConfessionController::class, "index"])->name('confessions');

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

// Show confessions page solo
Route::get('/confessions/{confession}', [ConfessionController::class, "confess"]);
// react to confession
Route::put('/confessions/{confession}', [ConfessionController::class, "react"]);

// delete
Route::delete('/confessions/reply/{reply}', [ConfessionController::class, "delete"]);

// reply to confession
Route::post('/confessions/{confession}/reply', [ConfessionController::class, "reply"]);

// Show edit credentials page
Route::get('/profile/show', [UpdateCredentialsController::class, "show"])->name('profile.show');
// Show edit credentials page
Route::put('/profile/edit', [UpdateCredentialsController::class, "update"])->name('profile.edit');

require __DIR__ . '/auth.php';
