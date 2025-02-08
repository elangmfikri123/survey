<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\FormKonsumenController;
use App\Http\Controllers\SatisfactionCAController;
use App\Http\Controllers\AwarenessHondaCareController;
use App\Http\Controllers\HondaCareController;
use App\Http\Controllers\SatisfactionHondaCareController;

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

    //ROUTE ERA
    Route::get('/get-era', [HondaCareController::class, 'getera']);
    Route::get('/get-era/data', [HondaCareController::class, 'geteradata']);
    Route::get('/era/update', [HondaCareController::class, 'eraupdate']);

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
    Route::get('/survey-awarenesshc/data', [AwarenessHondaCareController::class, 'surveytableHc']);
    Route::get('/survey-awarenesshc/data/{id}', [AwarenessHondaCareController::class, 'detaildataHc']);

    Route::get('/export-awarenesshc', [ExportController::class, 'exporthc']);
    Route::get('/export-urlhc', [ExportController::class, 'exportExcelhc']);
    Route::get('/export-awarenesshasilhc', [ExportController::class, 'exporthasilhc']);
    Route::post('/import-hc', [ImportController::class, 'importhc']);

    //ROUTE ADMIN SURVEY CSAT HONDA CARE
    Route::get('/survey-csathc', [SatisfactionHondaCareController::class, 'indexcsat']);
    Route::get('/survey-csathc/data', [SatisfactionHondaCareController::class, 'surveytablecHc']);
    Route::get('/survey-csathc/data/{id}', [SatisfactionHondaCareController::class, 'detaildatacHc']);

    Route::get('/export-csathc', [ExportController::class, 'exportcsathc']);
    Route::get('/export-urlcsathc', [ExportController::class, 'exportExcelchc']);
    Route::get('/export-csathasilhc', [ExportController::class, 'exporthasilchc']);
    Route::post('/import-csathc', [ImportController::class, 'importchc']);


    //ROUTE ADMIN SURVEY CSAT CUSTOMER ASISTEN
    Route::get('/survey-csatca', [SatisfactionCAController::class, 'indexcsatca']);
    Route::get('/survey-csatca/data', [SatisfactionCAController::class, 'surveytableca']);
    Route::get('/survey-csatca/data/{id}', [SatisfactionCAController::class, 'detaildataca']);

    Route::get('/export-csatca', [ExportController::class, 'exportca']);
    Route::get('/export-urlcsatca', [ExportController::class, 'exportExcelca']);
    Route::get('/export-csathasilca', [ExportController::class, 'exporthasilca']);
    Route::post('/import-csatca', [ImportController::class, 'importca']);


    //ROUTE DATA SUER
    Route::get('/get-user', [AuthController::class, 'getuser']);
    Route::get('/get-user/data', [AuthController::class, 'getusertable']);

    Route::get('/get-userera', [AuthController::class, 'getuserera']);
    Route::get('/get-userera/data', [AuthController::class, 'usereratable']);
});


//ROUTE FORM SURVEY AWARENESS CONTACT CENTER
Route::get('/form/{uuid}', [FormKonsumenController::class, 'formkonsumen']);
Route::post('/formsubmit/data', [FormKonsumenController::class, 'postform']);
Route::get('/form2', [FormKonsumenController::class, 'formkonsumen2']);

//ROUTE FORM SURVEY AWARENESS HONDA CARE
Route::get('/fhc/{uuid}', [FormKonsumenController::class, 'formhc']);
Route::post('/formsubmithc/data', [FormKonsumenController::class, 'postformhc']);
Route::get('/fhc2/{uuid}', [FormKonsumenController::class, 'formhc2'])->name('fhc2');
Route::post('/formsubmithc2/data', [FormKonsumenController::class, 'postformhc2']);
Route::get('/fhc3/{uuid}', [FormKonsumenController::class, 'formhc3'])->name('fhc3');

//ROUTE FORM SURVEY SATISFACTION HONDA CARE
Route::get('/fchc/{uuid}', [FormKonsumenController::class, 'formcsathc']);
Route::post('/formsubmitchc/data', [FormKonsumenController::class, 'postformcsat']);
Route::get('/fchc2/{uuid}', [FormKonsumenController::class, 'formcsathc2'])->name('fchc2');
Route::get('/fchc3/{uuid}', [FormKonsumenController::class, 'formcsathc3'])->name('fchc3');

//ROUTE FORM SURVEY SATISFACTION CUST ASISTEN
Route::get('/fca/{uuid}', [FormKonsumenController::class, 'formcsatca']);
Route::post('/formsubmitca/data', [FormKonsumenController::class, 'postformca']);
Route::get('/fca2/{uuid}', [FormKonsumenController::class, 'formcsatca2'])->name('fca2');
Route::get('/fca3/{uuid}', [FormKonsumenController::class, 'formcsatca3'])->name('fca3');
