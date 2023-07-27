<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        return view('pages.farmer');
    }

    public function store(Request $request)
    {
         Session([
            'biodata' =>[
                'farmer_name' => $request->input('farmer_name'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
            ]
        ]);

        return redirect()->route('diagnosis.index');
    }
}
