<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to display all goals
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
    public function store(StoreGoalRequest $request)
    {
        // Logic to store a new goal
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal)
    {
        // Logic to show a specific goal
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        // Logic to show the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGoalRequest $request, Goal $goal)
    {
        // Logic to update an existing goal
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        // Logic to delete a goal
    }
}
