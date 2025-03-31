<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Http\Requests\StoreCreditCardRequest;
use App\Http\Requests\UpdateCreditCardRequest;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to display all credit cards
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Logic to show the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditCardRequest $request)
    {
        // Logic to store a new credit card
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditCard $creditCard)
    {
        // Logic to show a specific credit card
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreditCard $creditCard)
    {
        // Logic to show the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditCardRequest $request, CreditCard $creditCard)
    {
        // Logic to update an existing credit card
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditCard $creditCard)
    {
        // Logic to delete a credit card
    }
}
