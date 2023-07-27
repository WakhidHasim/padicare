<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, DiagnosisController as DiagnosaController, FarmerController, TeamController, LoginController};
use App\Http\Controllers\Admin\{DashboardController, DiagnosisController, DiseaseController, KnowledgeBaseController, SymptomController};

Route::get('/', HomeController::class)->name('home');
Route::get('/teams', TeamController::class)->name('team');
Route::get('/biodata', [FarmerController::class, 'index'])->name('biodata.index');
Route::post('/biodata', [FarmerController::class, 'store'])->name('biodata.store');
Route::get('/diagnosis', [DiagnosaController::class, 'index'])->name('diagnosis.index');
Route::post('/diagnosis/analisa', [DiagnosaController::class, 'analisis'])->name('diagnosis.analisis');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::resource('symptoms', SymptomController::class)->except('show');
        Route::resource('diseases', DiseaseController::class);
        Route::resource('knowledge_bases', KnowledgeBaseController::class)->except('show');
        Route::resource('diagnoses', DiagnosisController::class)->except('create', 'store', 'edit', 'update', 'destroy');
    });