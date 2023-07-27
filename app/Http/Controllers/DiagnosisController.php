<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Disease;
use App\Models\Symptom;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function index()
    {
        return view('pages.diagnosis', [
            'symptoms' => Symptom::all()
        ]);
    }

    public function analisis(Request $request)
    {
        $arrWeight = [0, 1, 0.75, 0.5, 0.25];
        $arrSymptom = [];
        $arrCFCombine = [];
        for ($i=0; $i < count($request->condition); $i++) { 
            $arrCondition = explode('_', $request->condition[$i]);
            $condition[] = ['symptom_id' => $arrCondition[0]];
            $certainty[$arrCondition[0]] = $arrCondition[1];
            if (strlen($request->condition[$i]) > 1) {
                $arrSymptom += [$arrCondition[0] => $arrCondition[1]];
                $diseases = Disease::with(['knowledge_bases' => function ($result)  use ($certainty) {
                    $result->with('symptom')->whereIn('symptom_id', array_keys($certainty));
                }])->groupBy('id')->orderBy('id')->get();
            }
        }
        
        foreach ($diseases as $diasease) {
            foreach ($diasease->knowledge_bases as $knowledge_base) {
                $arrCFCombine[$diasease->id][] = $knowledge_base->certainty_factor * $arrWeight[$certainty[$knowledge_base->symptom_id]];
            }

            foreach ($arrCFCombine as $key => $cfCombine) {
                $newCF = 0;
                $sumCF = count($cfCombine);
                foreach ($cfCombine as $key2 => $cf) {
                    if (++$key2 == $sumCF) {
                        $oldCF = $newCF;
                        $newCF = $oldCF + $cf * (1 - $oldCF);
                        $totalCF = $newCF;
                    } elseif ($key2 >= 1) {
                        $oldCF = $newCF;
                        $newCF = $oldCF + $cf * (1 - $oldCF);
                    } else {
                        $newCF = $cf[0];
                    }
                }
                $resultCF[$key] = $totalCF;
            }
        }

        asort(($resultCF));
        Diagnosis::create([
            'farmer_name' => session('biodata')['farmer_name'],
            'phone_number' => session('biodata')['phone_number'],
            'address' => session('biodata')['address'],
            'disease_id' => array_key_first($resultCF),
            'presentase' => $resultCF[array_key_first($resultCF)]
        ]);

        $symptoms = Symptom::all();
        return view('pages.result', compact('resultCF', 'diseases', 'certainty', 'symptoms'));
    }
}