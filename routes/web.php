<?php

use App\Http\Controllers\DiseaseController;
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
Route::post('/symptom/update/{id}', [SymptomController::class, 'update']);
Route::get('/symptom/delete/{id}', [SymptomController::class, 'delete']);

//Disease
Route::get('/disease', [DiseaseController::class, 'index'])->name('disease');
Route::get('/disease/add', [DiseaseController::class, 'add']);
Route::get('/disease/detail/{id}', [DiseaseController::class, 'detail']);
Route::post('/disease/addData', [DiseaseController::class, 'insert']);
Route::get('/disease/edit/{id}', [DiseaseController::class, 'edit']);
Route::post('/disease/update/{id}', [DiseaseController::class, 'update']);
Route::get('/disease/delete/{id}', [DiseaseController::class, 'delete']);
