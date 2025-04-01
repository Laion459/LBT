<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function update(Request $request, Expense $expense)
    {
        $validatedData = $request->validate([
            'description' => 'nullable|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        $expense->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Expense updated successfully.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        $validatedData['user_id'] = Auth::id();
        Expense::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Expense created successfully.']);
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return response()->json(['success' => true, 'message' => 'Expense deleted successfully.']);
    }
}
