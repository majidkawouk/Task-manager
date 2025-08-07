<?php

use App\Http\Controllers\Taskscontroller;
use App\Http\Controllers\User;
use App\Http\Middleware\check_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/users', [User::class, 'showUsers']);
Route::post('/register', [User::class, 'register']);
Route::get('/users/{id}', [User::class, 'showUserbyid']);
Route::post('/login', [User::class, 'login']);



Route::get('/showtasks/{id}',[Taskscontroller::class,'ShowTasks']);
Route::post('/addtask',[Taskscontroller::class,'AddTask'])->middleware(check_admin::class);
Route::patch('/updatetask/{id}',[Taskscontroller::class,'UpdateTask']);
Route::delete('/tasks/{id}',[Taskscontroller::class,'RemoveTask']);