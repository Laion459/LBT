<?php

namespace App\Http\Controllers;

use App\Models\Financing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancingController extends Controller
{
    public function update(Request $request, Financing $financing)
    {
        $validatedData = $request->validate([
            'bank' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'interest_rate' => 'nullable|numeric',
            'installments' => 'nullable|integer',
            'monthly_payment' => 'nullable|numeric',
            'down_payment' => 'nullable|numeric',
            'paid' => 'nullable|integer',
            'owed' => 'nullable|numeric',
            'total' => 'nullable|numeric',
        ]);

        $financing->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Financing updated successfully.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bank' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'interest_rate' => 'required|numeric',
            'installments' => 'required|integer',
            'monthly_payment' => 'required|numeric',
            'down_payment' => 'required|numeric',
            'paid' => 'required|integer',
            'owed' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $validatedData['user_id'] = Auth::id();
        Financing::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Financing created successfully.']);
    }

    public function destroy(Financing $financing)
    {
        $financing->delete();

        return response()->json(['success' => true, 'message' => 'Financing deleted successfully.']);
    }
}
