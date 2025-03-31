<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to display all accounts
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
    public function store(StoreAccountRequest $request)
    {
        // Logic to store a new account
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        // Logic to show a specific account
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        // Logic to show the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        // Logic to update an existing account
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        // Logic to delete an account
    }
}
