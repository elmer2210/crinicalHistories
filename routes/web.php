<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClinicalHistoriesControllers;

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
//Index
Route::get('/', [ClinicalHistoriesControllers::class, 'view'])->name('clinicalHistories.view');

//Patient
Route::get('clinical_histories/patient/{id}', [ClinicalHistoriesControllers::class, 'patient'])->name('clinicalHistories.patient');

//Create 
Route::get('clinical_histories/create', [ClinicalHistoriesControllers::class, 'index'])->name('clinicalHistories.index');
Route::post('clinical_histories/create',[ClinicalHistoriesControllers::class, 'store'])->name('clinicalHistories.store');

//delete
Route::post('clinical_histories/delete/{id}', [ClinicalHistoriesControllers::class, 'destroy'])->name('clinicalHistories.delete');

//edit
Route::get('clinical_histories/edit/{id}', [ClinicalHistoriesControllers::class, 'show'])->name('clinicalHistories.show');
Route::put('clinical_histories/edit/{id}',[ClinicalHistoriesControllers::class, 'update'])->name('clinicalHistories.update');


