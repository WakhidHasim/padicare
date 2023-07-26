<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, DiagnosisController as DiagnosaController, TeamController};
use App\Http\Controllers\Admin\{DashboardController, DiagnosisController, DiseaseController, KnowledgeBaseController, SymptomController};

Route::get('/', HomeController::class)->name('home');
Route::get('/teams', TeamController::class)->name('team');
Route::get('/diagnosis', [DiagnosaController::class, 'index'])->name('diagnosis.index');

Route::prefix('admin')
    ->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::resource('symptoms', SymptomController::class)->except('show');
        Route::resource('diseases', DiseaseController::class);
        Route::resource('knowledge_bases', KnowledgeBaseController::class)->except('show');
        Route::resource('diagnoses', DiagnosisController::class)->except('create', 'store', 'edit', 'update', 'destroy');
    });