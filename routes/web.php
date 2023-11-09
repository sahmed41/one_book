<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssuanceController;

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

Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/add', [BookController::class, 'add'])->name('book.add');
Route::post('/book', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');
Route::get('/book/{book}/singleBook', [BookController::class, 'singleBook'])->name('book.singleBook');
Route::post('/book/lend', [BookIssuanceController::class, 'lend'])->name('book.issue'); // Route for issuing books to members
Route::put('/book/{issue}/return', [BookIssuanceController::class, 'return'])->name('book.return'); // Route for returning the issued book




