<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\FormKonsumenController;
use App\Http\Controllers\AwarenessHondaCareController;

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

//ROUTE ADMIN
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/authlogin', [AuthController::class, 'storeLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);

    //ROUTE ADMIN SURVEY AWARENESS CONTACT CENTER
    Route::get('/survey-awareness', [AdminController::class, 'index']);
    Route::get('/survey-awareness/data', [AdminController::class, 'surveytable']);
    Route::get('/survey-awareness/data/{id}', [AdminController::class, 'detaildata']); 

    Route::get('/export-awareness', [ExportController::class, 'export']);
    Route::get('/export-url', [ExportController::class, 'exportExcel']);
    Route::get('/export-awarenesscc', [ExportController::class, 'exportcc']);
    Route::post('/import', [ImportController::class, 'import']);

    //ROUTE ADMIN SURVEY AWARENESS HONDA CARE
    Route::get('/survey-awarenesshc', [AwarenessHondaCareController::class, 'indexhc']);
});


//ROUTE FORM SURVEY AWARENESS CONTACT CENTER
Route::get('/form/{uuid}', [FormKonsumenController::class, 'formkonsumen']);
Route::post('/formsubmit/data', [FormKonsumenController::class, 'postform']);

//ROUTE FORM SURVEY AWARENESS HONDA CARE

//ROUTE FORM SURVEY SATISFACTION HONDA CARE