<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SymptomRequest;
use App\Models\Symptom;

class SymptomController extends Controller
{
    public function index()
    {
        return view('pages.admin.symptom.index', [
            'symptoms' => Symptom::get()
        ]);
    }

    public function create()
    {
        $generate = Symptom::all()->count();

        if ($generate > 0) {
            $generateId = sprintf("G%03s", ++$generate);
        } elseif ($generate == 0) {
            $generateId = "G001";
        }

        return view('pages.admin.symptom.create', compact('generateId'));
    }

    public function store(SymptomRequest $request)
    {
        Symptom::create([
            'id' => $request->id,
            'symptom_name' => $request->symptom_name
        ]);

        return redirect()->route('symptoms.index')->with(['success' => 'Data Gejala Berhasil Ditambahkan!']);
    }

    public function edit(string $id)
    {
        return view('pages.admin.symptom.edit', [
            'symptom' => Symptom::findOrFail($id)
        ]);
    }

    public function update(SymptomRequest $request, string $id)
    {
        $data = $request->all();
        $symptom = Symptom::findOrFail($id);

        $symptom->update([
            'id' => $data['id'],
            'symptom_name' => $data['symptom_name']
        ]);

        return redirect()->route('symptoms.index')->with(['success' => 'Data Gejala Berhasil Diedit!']);
    }

    public function destroy(string $id)
    {
        $symptom = Symptom::findOrFail($id);
        $symptom->delete();
        return redirect()->route('symptoms.index')->with(['success' => 'Data Gejala Berhasil Dihapus']);
    }
}