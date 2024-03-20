<?php

use App\Http\Controllers\TaskController;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
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
    return redirect()->route('tasks.index');
});

Route::get('/tasks', [TaskController::class, 'index'])
    ->name('tasks.index');

Route::view('tasks/create', 'create')
->name('tasks.create');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
    ->name('tasks.edit');

Route::get('/tasks/{task}', [TaskController::class, 'show'])
    ->name('tasks.show');

Route::post('/tasks', [TaskController::class, 'store'])
    ->name('tasks.store');

Route::put('/tasks/{task}', [TaskController::class, 'update'])
    ->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
    ->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', [TaskController::class, 'toggleComplete'])
    ->name('tasks.toggle-complete');

Route::fallback(function () {
    return 'Still got somewhere!';
});
