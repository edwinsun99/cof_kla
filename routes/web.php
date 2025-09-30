<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\NewCaseController;
use App\Http\Controllers\DetailController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cases/new', function () {
    return view('newcase'); 
})->name('cases.new');

// Routing untuk Service
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

// Routing untuk Case
Route::get('/case', [CaseController::class, 'index'])->name('case.index');
Route::get('/newcase', [CaseController::class, 'create'])->name('newcase');
Route::get('/case/{id}', [DetailController::class, 'show'])->name('case.show');

// Routing untuk PDF (untuk library DOMPDF sudah diinstall)
Route::get('/case/{id}/pdf', [DetailController::class, 'downloadPdf'])->name('case.downloadPdf');


