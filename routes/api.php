<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\CustomersController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('customers/{id}', [CustomersController::class, 'create']);
Route::get('customers/{id}', [CustomersController::class, 'show']);
Route::delete('customers/{id}', [CustomersController::class, 'delete']);
Route::patch('customers/{id}', [CustomersController::class, 'update']);
Route::get('customers', [CustomersController::class, 'index']);


Route::post('notes/{customer_id}/notes/{id}', [NotesController::class, 'create']);
Route::get('notes/{customer_id}/notes/{id}', [NotesController::class, 'show']);
Route::delete('notes/{customer_id}/notes/{id}', [NotesController::class, 'delete']);
Route::patch('notes/{customer_id}/notes/{id}', [NotesController::class, 'update']);
Route::get('notes/{customer_id}/notes', [NotesController::class, 'index']);
