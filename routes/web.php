<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\NewCaseController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cases/new', function () {
    return view('newcase'); // pastikan file ada di resources/views/newcase.blade.php
})->name('cases.new');

// Routing untuk Service
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/case', [CaseController::class, 'index'])->name('case.index');
Route::get('/case', [ServiceController::class, 'index'])->name('services.index');
Route::get('/newcase', [CaseController::class, 'create'])->name('newcase');
Route::get('/case', [CaseController::class, 'index'])->name('case.index');

