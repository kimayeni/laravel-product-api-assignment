<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/dashboard', function () {
    return "This is your Task Manager Dashboard.";
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/tasks/create', [TaskController::class, 'create']);

Route::post('/tasks', [TaskController::class, 'store']);

Route::get('/tasks/{id}', [TaskController::class, 'show']);

Route::put('/tasks/{task}/complete', [TaskController::class, 'markComplete']);