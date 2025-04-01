<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function update(Request $request, Asset $asset)
    {
        $validatedData = $request->validate([
            'actions' => 'nullable|numeric',
            'fixed_income' => 'nullable|numeric',
        ]);

        $asset->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Asset updated successfully.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'actions' => 'required|numeric',
            'fixed_income' => 'required|numeric',
        ]);

        $validatedData['user_id'] = Auth::id();
        Asset::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Asset created successfully.']);
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return response()->json(['success' => true, 'message' => 'Asset deleted successfully.']);
    }
}
