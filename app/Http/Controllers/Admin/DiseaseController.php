<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiseaseRequest;
use App\Models\Disease;
use Illuminate\Support\Str;

class DiseaseController extends Controller
{
    public function index()
    {
        return view('pages.admin.disease.index', [
            'diseases' => Disease::get()
        ]);
    }

    public function create()
    {
        $generate = Disease::all()->count();

        if ($generate > 0) {
            $generateId = sprintf("J%03s", ++$generate);
        } elseif ($generate == 0) {
            $generateId = "J001";
        }

        return view('pages.admin.disease.create', compact('generateId'));
    }

    public function store(DiseaseRequest $request)
    {
        Disease::create([
            'id' => $request->id,
            'disease_name' => $request->disease_name,
            'slug' => Str::slug($request->nama),
            'description' => $request->description,
            'solution' => $request->solution
        ]);

        return redirect()->route('diseases.index')->with(['success' => 'Data Penyakit Berhasil Ditambahkan!']);
    }

    public function show(string $id)
    {
        return view('pages.admin.disease.show', [
            'disease' => Disease::findOrFail($id)
        ]);
    }

    public function edit(string $id)
    {
        return view('pages.admin.disease.edit', [
            'disease' => Disease::findOrFail($id)
        ]);
    }

    public function update(DiseaseRequest $request, string $id)
    {
        $data = $request->all();
        $disease = Disease::findOrFail($id);

        $disease->update([
            'id' => $data['id'],
            'disease_name' => $data['disease_name'],
            'slug' => $data['slug'] = Str::slug($data['disease_name']),
            'description' => $data['description'],
            'solution' => $data['solution']
        ]);

        return redirect()->route('diseases.index')->with(['success' => 'Data Gejala Berhasil Diedit!']);
    }

    public function destroy(string $id)
    {
        $disease = Disease::findOrFail($id);
        $disease->delete();
        return redirect()->route('diseases.index')->with(['success' => 'Data Gejala Berhasil Dihapus']);
    }
}