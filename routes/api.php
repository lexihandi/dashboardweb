<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\DiseaseController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Symptom
Route::get('symptom', [SymptomController::class, 'getData']);
Route::post('symptom', [SymptomController::class, 'createData']);
Route::put('/symptom/{id}', [SymptomController::class, 'updateData']);
Route::delete('/symptom/{id}', [SymptomController::class, 'deleteData']);

//Disease
Route::get('disease', [DiseaseController::class, 'getData']);
Route::post('disease', [DiseaseController::class, 'createData']);
Route::put('/disease/{id}', [DiseaseController::class, 'updateData']);
Route::delete('/disease/{id}', [DiseaseController::class, 'deleteData']);
