<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssuanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function() {
    return view('welcome');
})->name('login');

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('authenticate.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('authenticate.logout');

// Navigational Routes
Route::get('/book', [BookController::class, 'index'])->name('book.index')->middleware('auth');
Route::get('/book/add', [BookController::class, 'add'])->name('book.add')->middleware('auth');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit')->middleware('auth');
Route::get('/book/{book}/singleBook', [BookController::class, 'singleBook'])->name('book.singleBook')->middleware('auth');

// Operational routes
Route::post('/book', [BookController::class, 'store'])->name('book.store'); // Route for adding book to database
Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update'); // Route for updating book information
Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy'); // Route for deleting a book
Route::post('/book/lend', [BookIssuanceController::class, 'lend'])->name('book.issue'); // Route for issuing books to members
Route::put('/book/{issue}/return', [BookIssuanceController::class, 'return'])->name('book.return'); // Route for returning the issued book




