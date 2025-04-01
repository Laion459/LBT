<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditCardController extends Controller
{
    public function update(Request $request, CreditCard $creditCard)
    {
        $validatedData = $request->validate([
            'card' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'installments' => 'nullable|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        $creditCard->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Credit Card updated successfully.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'card' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'installments' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        $validatedData['user_id'] = Auth::id();
        CreditCard::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Credit Card created successfully.']);
    }

    public function destroy(CreditCard $creditCard)
    {
        $creditCard->delete();

        return response()->json(['success' => true, 'message' => 'Credit Card deleted successfully.']);
    }
}
