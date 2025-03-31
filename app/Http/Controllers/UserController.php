<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to display all users
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
    public function store(StoreUserRequest $request)
    {
        // Logic to store a new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Logic to show a specific user
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Logic to show the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Logic to update an existing user
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Logic to delete a user
    }
}
