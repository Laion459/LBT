<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to display all transactions
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
    public function store(StoreTransactionRequest $request)
    {
        // Logic to store a new transaction
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        // Logic to show a specific transaction
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        // Logic to show the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        // Logic to update an existing transaction
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // Logic to delete a transaction
    }
}
