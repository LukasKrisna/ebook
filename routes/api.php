<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('Book', BookController::class)->except('create', 'edit');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/Book', [BookController::class, 'index']);
Route::get('/Book{id}', [BookController::class, 'show']);
Route::get('/Author', [AuthorController::class, 'index']);
Route::get('/Author/{id}', [AuthorController::class, 'show']);


//private route
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('Book', BookController::class)->except('create', 'edit', 'index', 'show');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('Author', AuthorController::class)->except('create', 'edit', 'show', 'index');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
