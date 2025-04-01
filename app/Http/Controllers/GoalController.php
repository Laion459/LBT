<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;  // Importe a classe Request
use Illuminate\Support\Facades\Auth; // Importe a classe Redirect
use Illuminate\Support\Facades\Redirect;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::all(); // Retrieve all goals from the database

        return view('goals.index', compact('goals')); // Pass the goals to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goals.create'); // Show the create form (create.blade.php)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Use the generic Request class
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'target_amount' => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0', // Current amount can be optional initially
            'target_date' => 'required|date',
        ]);

        // Create a new goal using the validated data
        $goal = new Goal;
        $goal->name = $validatedData['name'];
        $goal->target_amount = $validatedData['target_amount'];
        $goal->current_amount = $validatedData['current_amount'] ?? 0; // Default to 0 if not provided
        $goal->target_date = $validatedData['target_date'];
        $goal->user_id = Auth::id();
        $goal->save();

        // Redirect to the index page with a success message
        return redirect()->route('goals.index')->with('success', 'Goal created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal)
    {
        return view('goals.show', compact('goal'));  // Pass the goal to the show view (show.blade.php)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal')); // Pass the goal to the edit view (edit.blade.php)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goal $goal)  // Use the generic Request class
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'target_amount' => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'target_date' => 'required|date',
        ]);

        // Update the goal with the validated data
        $goal->name = $validatedData['name'];
        $goal->target_amount = $validatedData['target_amount'];
        $goal->current_amount = $validatedData['current_amount'] ?? 0;
        $goal->target_date = $validatedData['target_date'];
        $goal->save();

        // Redirect to the index page with a success message
        return redirect()->route('goals.index')->with('success', 'Goal updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();

        // Redirect to the index page with a success message
        return redirect()->route('goals.index')->with('success', 'Goal deleted successfully!');
    }
}
