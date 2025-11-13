<<<<<<< HEAD
c<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// ===========================
// 🔹 IMPORT CONTROLLERS
// ===========================

// MASTER CONTROLLERS
use App\Http\Controllers\master\ServiceController as MasterServiceController;
use App\Http\Controllers\master\HomeController as MasterHomeController;
use App\Http\Controllers\master\CaseController as MasterCaseController;
use App\Http\Controllers\master\NewCaseController as MasterNewCaseController;
use App\Http\Controllers\master\DetailController as MasterDetailController;
use App\Http\Controllers\master\UserController;
use App\Http\Controllers\master\RoleController;
use App\Http\Controllers\master\ProductController;

// CM CONTROLLERS
use App\Http\Controllers\cm\ServiceController as CmServiceController;
use App\Http\Controllers\cm\HomeController as CmHomeController;
use App\Http\Controllers\cm\CaseController as CmCaseController;
use App\Http\Controllers\cm\DetailController as CmDetailController;
use App\Http\Controllers\cm\QuotPartReqController;
use App\Http\Controllers\cm\QuotReqController; 

// CE CONTROLLERS
use App\Http\Controllers\ce\ServiceController as CeServiceController;
use App\Http\Controllers\ce\HomeController as CeHomeController;
use App\Http\Controllers\ce\CaseController as CeCaseController;
use App\Http\Controllers\ce\DetailController as CeDetailController;
use App\Http\Controllers\ce\EngineerController;
use App\Http\Controllers\ce\QuotAppCancController;

// OTHER CONTROLLERS
use App\Http\Controllers\MasterController;
use App\Http\Controllers\Auth\LoginController;

// ===========================
// 🔐 AUTH ROUTES
// ===========================
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Default redirect ke login
Route::get('/', fn() => redirect()->route('login'));

// ===========================
// 🔹 MASTER ROUTES
// ===========================
Route::group([], function () {
    Route::get('/master/home', function () {
        if (!Session::get('login') || Session::get('role') !== 'MASTER') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }
        return app(MasterHomeController::class)->index();
    })->name('master.home');

    Route::get('/home', function () {
        if (!Session::get('login') || Session::get('role') !== 'MASTER') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }
        return view('master.home');
    })->name('home');

    Route::get('/services', [MasterServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [MasterServiceController::class, 'store'])->name('services.store');

    Route::get('/case', [MasterCaseController::class, 'index'])->name('case.index');
    Route::get('/newcase', [MasterCaseController::class, 'create'])->name('master.newcase');
    Route::get('/master/case/{id}', [MasterDetailController::class, 'show'])->name('case.show');

    Route::get('/case/{id}/pdf', [MasterDetailController::class, 'downloadPdf'])->name('case.downloadPdf');
    Route::get('/case/{id}/pdf/preview', [MasterDetailController::class, 'previewPdf'])->name('case.previewPdf');

    Route::get('/cases/search', [MasterCaseController::class, 'search'])->name('case.search');
    Route::get('/excel/cofdata', [MasterCaseController::class, 'excel'])->name('excel.cofdata');

    Route::prefix('master')->group(function () {
        Route::get('/manage-roles', [RoleController::class, 'index'])->name('roles.index');
        Route::post('/manage-roles', [RoleController::class, 'store'])->name('roles.store');
        Route::delete('/manage-roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::get('/get-product-type', [ProductController::class, 'getProductType'])->name('getProductType');
    });
});

// ===========================
// 🔹 CM ROUTES
// ===========================
Route::prefix('cm')->name('cm.')->group(function () {
    Route::get('/home', function () {
        if (!Session::get('login') || Session::get('role') !== 'CM') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }
        return app(CmHomeController::class)->index();
    })->name('home');

    Route::get('/services', [CmServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [CmServiceController::class, 'store'])->name('services.store');

    Route::get('/case', [CmCaseController::class, 'index'])->name('case.index');
    Route::get('/case/{id}', [CmDetailController::class, 'show'])->name('case.show');
});

// ===========================
// 🔹 CE ROUTES
// ===========================
Route::group([], function () {
    Route::get('/ce/home', function () {
        if (!Session::get('login') || Session::get('role') !== 'CE') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }
        return app(CeHomeController::class)->index();
    })->name('ce.home');

    Route::get('/home', function () {
        if (!Session::get('login') || Session::get('role') !== 'CE') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }
        return view('ce.home');
    })->name('home');

    Route::get('/ce/services', [CeServiceController::class, 'index'])->name('ce.services.index');
    Route::post('/ce/services', [CeServiceContrcoller::class, 'store'])->name('ce.services.store');

    Route::get('/ce/case', [CeCaseController::class, 'index'])->name('ce.case.index');
    Route::get('/ce/case/logdate', [CeCaseController::class, 'logdate'])->name('ce.case.logdate');
    Route::get('ce/cases/new', fn() => view('ce.newcase'))->name('cases.new');
    Route::get('ce/newcase', [CeCaseController::class, 'create'])->name('newcase');
    Route::post('/ce/newcase', [CeCaseController::class, 'store'])->name('ce.case.store');

    Route::get('/case/{id}', [CeDetailController::class, 'show'])->name('ce.case.show');
    Route::get('/case/{id}/pdf', [CeDetailController::class, 'downloadPdf'])->name('case.downloadPdf');
    Route::get('/case/{id}/pdf/preview', [CeDetailController::class, 'previewPdf'])->name('case.previewPdf');

    Route::get('/cases/search', [CeCaseController::class, 'search'])->name('case.search');
    Route::get('/excel/cofdata', [CeCaseController::class, 'excel'])->name('excel.cofdata');
});

// ===========================
// ⚡️ ALIAS: CS ROUTES → ARAHKAN KE CE
// (agar semua endpoint lama CS tetap bisa dipakai)
// ===========================
Route::prefix('cs')->group(function () {
    Route::get('/home', fn() => redirect()->route('ce.home'));
    Route::get('/services', [CeServiceController::class, 'index'])->name('cs.services.index');
    Route::post('/services', [CeServiceController::class, 'store'])->name('cs.services.store');

    Route::get('/case', [CeCaseController::class, 'index'])->name('cs.case.index');
    Route::get('/case/{id}', [CeDetailController::class, 'show'])->name('cs.case.show');
    Route::get('/cases/new', fn() => redirect()->route('cases.new'))->name('cs.cases.new');

    Route::get('/case/{id}/pdf', [CeDetailController::class, 'downloadPdf'])->name('cs.case.downloadPdf');
    Route::get('/case/{id}/pdf/preview', [CeDetailController::class, 'previewPdf'])->name('cs.case.previewPdf');

    Route::get('/cases/search', [CeCaseController::class, 'search'])->name('cs.case.search');
    Route::get('/excel/cofdata', [CeCaseController::class, 'excel'])->name('cs.excel.cofdata');
    
});
Route::middleware(['web', 'check.session'])->prefix('ce')->group(function () {
    Route::get('/home', [CeHomeController::class, 'index'])->name('ce.home');
    Route::post('/services', [CeServiceController::class, 'store'])->name('ce.services.store');
});
=======
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
Route::get('/case/{id}/pdf/preview', [DetailController::class, 'previewPdf'])->name('case.previewPdf');

// routes/web.php
Route::get('/cases/search', [CaseController::class, 'search'])->name('case.search');
Route::get('/excel/cofdata', [CaseController::class, 'excel'])->name('excel.cofdata');
Route::get('/get-nama-type/{[pn}', [NewCaseController::class, 'getNamaType'])->name('get.namaType');

>>>>>>> 1ceaeb5f97112d2834eed21cc13180f9d2e49f31


