<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function update(Request $request, Revenue $revenue)
    {
        $validatedData = $request->validate([
            'description' => 'nullable|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        $revenue->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Revenue updated successfully.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        $validatedData['user_id'] = Auth::id();
        Revenue::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Revenue created successfully.']);
    }

    public function destroy(Revenue $revenue)
    {
        $revenue->delete();

        return response()->json(['success' => true, 'message' => 'Revenue deleted successfully.']);
    }
}
