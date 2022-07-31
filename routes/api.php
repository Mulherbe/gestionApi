<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CalendarController;
use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\TodoController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\CloudController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\WalletController;

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


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

//  Route Api web
Route::apiResource("users", UserController::class);

Route::post('deleteUser', [UserController::class, 'deleteUser']);

// Route::post('getUserById', [UserController::class, 'getUserById'])->middleware('auth:sanctum');

Route::post('/getNoteById', [NoteController::class, 'getNoteById']);



Route::apiResource('Category', CategoryController::class);

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

// todo back office
Route::post('getTodo', [CategoryController::class, 'getTodo']);

// Route API appli

    Route::group()['middleware' => ['auth:sanctum']], function () {

        Route::post('/getUserById', [UserController::class, 'getUserById']);

        // TODO
        Route::post('addTodo', [TodoController::class, 'addTodo']);
        Route::post('getTodoByUser', [TodoController::class, 'getTodoByUser']);
        Route::post('deleteTodo', [TodoController::class, 'deleteTodo']);
        Route::post('updateState', [TodoController::class, 'updateState']);

        // WALLET
        Route::post('/addValueWallet', [WalletController::class, 'addValueWallet']);
        Route::post('/getWalletByUser', [WalletController::class, 'getWalletByUser']);
        Route::post('/getPriceCrypto', [WalletController::class, 'getPriceCrypto']);

        // NOTE

        Route::post('addNote', [NoteController::class, 'addNote']);
        Route::post('getNoteByUser', [NoteController::class, 'getNoteByUser']);
        Route::post('deleteNote', [NoteController::class, 'deleteNote']);
        Route::post('updateNote', [NoteController::class, 'updateNote']);

    });




    




