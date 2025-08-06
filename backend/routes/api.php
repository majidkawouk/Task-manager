<?php

use App\Http\Controllers\Taskscontroller;
use App\Http\Controllers\User;
use App\Http\Middleware\check_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| These routes are loaded by the RouteServiceProvider and assigned to the "api" middleware group.
| Make something great!
*/

Route::get('/hello', function () {
    return response()->json([
        'message' => 'API is working!',
        'author' => 'Majd',
    ]);
});

// Example of a POST route
Route::post('/submit', function (Request $request) {
    $data = $request->all();
    return response()->json([
        'message' => 'Data received!',
        'data' => $data,
    ]);
});


Route::get('/users', [User::class, 'showUsers']);
Route::post('/register', [User::class, 'register']);
Route::get('/users/{id}', [User::class, 'showUserbyid']);
Route::post('/login', [User::class, 'login']);



Route::get('/showtasks',[Taskscontroller::class,'ShowTasks']);
Route::post('/addtask',[Taskscontroller::class,'AddTask'])->middleware(check_admin::class);
Route::patch('/updatetask/{id}',[Taskscontroller::class,'UpdateTask']);
Route::delete('/tasks/{id}',[Taskscontroller::class,'RemoveTask']);