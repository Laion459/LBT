<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{
    public function update(Request $request, Debt $debt)
    {
        $validatedData = $request->validate([
            'item' => 'nullable|string|max:255',
            'installments' => 'nullable|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        $debt->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Debt updated successfully.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item' => 'required|string|max:255',
            'installments' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        $validatedData['user_id'] = Auth::id();
        Debt::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Debt created successfully.']);
    }

    public function destroy(Debt $debt)
    {
        $debt->delete();

        return response()->json(['success' => true, 'message' => 'Debt deleted successfully.']);
    }
}
