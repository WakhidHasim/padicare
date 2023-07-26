<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\Disease;
use App\Models\KnowledgeBase;
use App\Models\Symptom;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('pages.admin.dashboard.index', [
            'symptoms' => Symptom::count(),
            'diseases' => Disease::count(),
            'knowledge_bases' => KnowledgeBase::count(),
            'diagnoses' => Diagnosis::count()
        ]);
    }
}