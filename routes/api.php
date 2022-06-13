<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CalendarController;
use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\TodoController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\CloudController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//  Route Api web
Route::apiResource("users", UserController::class);

Route::apiResource('calendar', CalendarController::class);

Route::get('calendarUser/{id}', [CalendarController::class, 'getAllCalendarByUser']);

Route::get('noteUser/{id}', [NoteController::class, 'getAllNoteByUser']);

Route::get('todoUser/{id}', [TodoController::class, 'getAllTodoByUser']);

Route::get('settingUser/{id}', [SettingController::class, 'getAllSettingByUser']);

// get size total cloud
Route::get('getSizeCloud', [CloudController::class, 'getSizeTotalCloud']);
// get size by user cloud
Route::post('getSizeCloudByUser', [CloudController::class, 'getSizeCloudByUser']);
// upload files 
Route::post('uploadFiles', [CloudController::class, 'upload']);

// upload files 
Route::post('uploadFiles', [CloudController::class, 'upload']);

// Route API appli

Route::post('addTodo', [TodoController::class, 'addTodo']);
Route::get('getTodoByUser', [TodoController::class, 'getTodoByUser']);
