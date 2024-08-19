<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoListController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/todos', [TodoListController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoListController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoListController::class, 'store'])->name('todos.store');
    Route::get('/todos/{id}', [TodoListController::class, 'show'])->name('todos.show');
    Route::get('/todos/{id}/edit', [TodoListController::class, 'edit'])->name('todos.edit');
    Route::patch('/todos/{id}', [TodoListController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{id}', [TodoListController::class, 'destroy'])->name('todos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
