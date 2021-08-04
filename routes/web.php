<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/me', function () {
//     return response()-> json(
//         [
//             'NIS'   => '3103119103',
//             'Name'  => 'Lukas Krisna',
//             'Gender'=> 'Male',
//             'Phone' => '082328613817',
//             'Class' => 'XII RPL 3'
            
//         ]
//     );
// });

Route::get('/me', [AuthController::class, 'me']);