<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KnowledgeBaseRequest;
use App\Models\Disease;
use App\Models\KnowledgeBase;
use App\Models\Symptom;

class KnowledgeBaseController extends Controller
{
    public function index()
    {
        return view('pages.admin.knowledge_base.index', [
            'knowledge_bases' => KnowledgeBase::with(['symptom', 'disease'])->latest()->get()
        ]);
    }

    public function create()
    {
        return view('pages.admin.knowledge_base.create', [
            'symptoms' => Symptom::select('id', 'symptom_name')->get(),
            'diseases' => Disease::select('id', 'disease_name')->get()
        ]);
    }

    public function store(KnowledgeBaseRequest $request)
    {
        KnowledgeBase::create([
            'symptom_id' => $request->symptom_id,
            'disease_id' => $request->disease_id,
            'certainty_factor' => $request->certainty_factor
        ]);

        return redirect()->route('knowledge_bases.index')->with(['success' => 'Data Basis Pengetahuan Berhasil Ditambahkan!']);
    }

    public function edit(string $id)
    {
        return view('pages.admin.knowledge_base.edit', [
            'knowledge_base' => KnowledgeBase::findOrFail($id),
            'symptoms' => Symptom::select('id', 'symptom_name')->get(),
            'diseases' => Disease::select('id', 'disease_name')->get()
        ]);
    }

    public function update(KnowledgeBaseRequest $request, string $id)
    {
        $data = $request->all();

        $knowledge_base = KnowledgeBase::findOrFail($id);

        $knowledge_base->update([
            'symptom_id' => $data['symptom_id'],
            'disease_id' => $data['disease_id'],
            'certainty_factor' => $data['certainty_factor']
        ]);

        return redirect()->route('knowledge_bases.index')->with(['success' => 'Data Basis Pengetahuan Berhasil Diedit!']);
    }

    public function destroy(string $id)
    {
        $knowledge_base = KnowledgeBase::findOrFail($id);
        $knowledge_base->delete();
        return redirect()->route('knowledge_bases.index')->with(['success' => 'Data Basis Pengetahuan Berhasil Dihapus']);
    }
}