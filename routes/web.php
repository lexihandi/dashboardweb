<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SymptomController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'index']);

//Symptom
Route::get('/symptom', [SymptomController::class, 'index'])->name('symptom');
Route::get('/symptom/add', [SymptomController::class, 'add']);
Route::post('/symptom/addData', [SymptomController::class, 'insert']);
Route::get('/symptom/edit/{id}', [SymptomController::class, 'edit']);
Route::put('/symptom/update/{id}', [SymptomController::class, 'update']);
Route::delete('/symptom/delete/{id}', [SymptomController::class, 'delete']);

//
// Route::get('symptom', [SymptomController::class, 'index']);
// Route::post('symptom', [SymptomController::class, 'create']);
// Route::put('/symptom/{id}', [SymptomController::class, 'update']);
// Route::delete('/symptom/{id}', [SymptomController::class, 'delete']);