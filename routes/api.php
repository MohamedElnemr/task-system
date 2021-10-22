<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Authrize\AuthorizeController;

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


Route::group([

    'middleware' => 'auth',

], function ($router) {

Route::get('create-role',[AuthorizeController::class,'createRole'] );

Route::get('create-permission', [AuthorizeController::class,'createPermission']);

Route::get('perm-to-role', [AuthorizeController::class,'addPermissionToRole']);

Route::get('assignRole', [AuthorizeController::class,'addRoleToUser']);

Route::get('Test-permission',[AuthorizeController::class,'testPermission'] );

});



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',[AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh',  [AuthController::class,'refresh']);
    Route::post('me',  [AuthController::class,'me']);

});


Route::group([

    'middleware' => 'auth',


], function ($router) {

Route::get('users', [UserController::class,'index']);
Route::post('users', [UserController::class,'store']);
Route::get('users/{id}', [UserController::class,'show']);
Route::get('users/{id}', [UserController::class,'update']);
Route::get('users/{id}', [UserController::class,'destroy']);

});
