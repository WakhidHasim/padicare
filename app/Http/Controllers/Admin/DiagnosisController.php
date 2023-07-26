<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\Disease;

class DiagnosisController extends Controller
{
    public function index()
    {
        return view('pages.admin.diagnosis.index', [
            'diagnoses' => Diagnosis::with('disease')->latest()->get()
        ]);
    }

    public function show(string $id)
    {
        return view('pages.admin.diagnosis.show', [
            'disease' => Disease::findOrFail($id),
            'diagnosis' => Diagnosis::findOrFail($id)
        ]);
    }
}