<?php

use App\Http\Controllers\ExportFilesController;
use App\Http\Controllers\P9A_taxController;
use App\Http\Controllers\ExportController;
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

//Route::get('/', function () {
//    return view('Home');
//});

Route::get('/',[P9A_taxController::class,'index'])->name('P9A_form');

Route::post('/',[P9A_taxController::class,'index'])->name('P9A_form.save');


Route::post('/viewPdf',[P9A_taxController::class,'viewPDF'])->name('ViewPDF');

Route::post('/generatePdf',[P9A_taxController::class,'generatePDF'])->name('generatePdf');
Route::get('/generateExcel',[P9A_taxController::class,'generateExcel'])->name('generateExcel');



//Route::get('/Generate_File',[ExportController::class,'view'])->name('P9A_form');


//Route::get('/Generate_File',[ExportFilesController::class,'view'])->name('P9A_form');
//Route::post('/Generate_File',[ExportFilesController::class,'view'])->name('P9A_form.save');
//


