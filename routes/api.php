<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CalendarController;
use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\TodoController;
use App\Http\Controllers\API\SettingController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource("users", UserController::class);

Route::apiResource('calendar', CalendarController::class);

Route::get('calendarUser/{id}', [CalendarController::class, 'getAllCalendarByUser']);

Route::get('noteUser/{id}', [NoteController::class, 'getAllNoteByUser']);

Route::get('todoUser/{id}', [TodoController::class, 'getAllTodoByUser']);

Route::get('settingUser/{id}', [SettingController::class, 'getAllSettingByUser']);




