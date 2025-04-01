<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function update(Request $request, Result $result)
    {
        $validatedData = $request->validate([
            'payment' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
            'passive_income' => 'nullable|numeric',
        ]);

        $result->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Result updated successfully.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'payment' => 'required|numeric',
            'balance' => 'required|numeric',
            'passive_income' => 'required|numeric',
        ]);

        $validatedData['user_id'] = Auth::id();
        Result::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Result created successfully.']);
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return response()->json(['success' => true, 'message' => 'Result deleted successfully.']);
    }
}
