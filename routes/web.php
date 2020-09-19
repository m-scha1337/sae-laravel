<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostingController;

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


// == Auth

Route::get('/login', [AuthController::class, 'getLogin'])->name('auth.getLogin');
Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


// == Postings

Route::middleware(['lang'])->group(function() {

    Route::get('/postings', [PostingController::class, 'index'])->name('postings.index');

    Route::middleware(['auth'])->group(function() {

        Route::get('/postings/create', [PostingController::class, 'create'])->name('postings.create');
        Route::post('/postings', [PostingController::class, 'store'])->name('postings.store');
        Route::get('/postings/{id}', [PostingController::class, 'show'])->name('postings.show'); // ->middleware('auth');
        Route::get('/postings/{id}/pdf', [PostingController::class, 'showPdf'])->name('postings.showPdf');
        Route::get('/postings/{id}/edit', [PostingController::class, 'edit'])->name('postings.edit');
        Route::put('/postings/{id}', [PostingController::class, 'update'])->name('postings.update');
        Route::delete('/postings/{id}', [PostingController::class, 'destroy'])->name('postings.destroy');
    });
});

/*
Route::middleware(['auth','lang'])->prefix('{country}')->group(function() {

    Route::get('/testme/{id}', 'PostingController@showTestme');
});
*/

// Route::resource('postings', 'PostingController');
