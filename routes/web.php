<?php

use App\Http\Controllers\RegisterUserController;
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

Route::get('/', [\App\Http\Controllers\AuthUserController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/', [\App\Http\Controllers\AuthUserController::class, 'login'])->middleware('guest');
Route::post('/logout', [\App\Http\Controllers\AuthUserController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterUserController::class, 'showForm'])->middleware('guest');
Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest');

Route::get('/tasks', [\App\Http\Controllers\TasksController::class, 'index'])->middleware('auth')->name('tasks.index');
Route::get('/tasks/create', [\App\Http\Controllers\TasksController::class, 'showCreateForm'])->middleware('auth');
Route::post('/tasks/create', [\App\Http\Controllers\TasksController::class, 'create'])->middleware('auth');
Route::get('/tasks/{id}/edit', [\App\Http\Controllers\TasksController::class, 'showEditForm'])->middleware('auth')->name('tasks.edit');
Route::post('/tasks/{id}/edit', [\App\Http\Controllers\TasksController::class, 'edit'])->middleware('auth');

Route::put('/tasks/{id}/markDone', [\App\Http\Controllers\TasksController::class, 'toggleCompleted'])->middleware('auth');
Route::post('/tasks/{id}/delete', [\App\Http\Controllers\TasksController::class, 'delete'])->middleware('auth');
Route::post('/tasks/{id}/restore', [\App\Http\Controllers\TasksController::class, 'restore'])->middleware('auth');
Route::get('/tasks/deleted', [\App\Http\Controllers\TasksController::class, 'showDeletedTasks'])->middleware('auth');
Route::post('/tasks/{id}/deletePerm', [\App\Http\Controllers\TasksController::class, 'deletePermanently'])->middleware('auth');
Route::post('/tasks/clearDeleted', [\App\Http\Controllers\TasksController::class, 'clearDeleted'])->middleware('auth');


