<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntityRequest;
use App\Http\Requests\UpdateEntityRequest;
use App\Models\Entity;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all entities for the current user
        $entities = Entity::where('user_id', Auth::id())->get();

        // Pass the entities to the index view
        return view('entities.index', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Display the create form
        return view('entities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntityRequest $request)
    {
        // Validate the request data using the StoreEntityRequest
        $validatedData = $request->validated();

        // Create a new entity instance
        $entity = new Entity;

        // Fill the entity with the validated data
        $entity->fill($validatedData);

        // Set the user_id to the currently authenticated user
        $entity->user_id = Auth::id();

        // Save the entity to the database
        $entity->save();

        // Redirect to the index page with a success message
        return redirect()->route('entities.index')->with('success', 'Entity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entity $entity)
    {
        // Check if the entity belongs to the current user
        if ($entity->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.'); // Or redirect with an error message
        }

        // Pass the entity to the show view
        return view('entities.show', compact('entity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entity $entity)
    {
        // Check if the entity belongs to the current user
        if ($entity->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.'); // Or redirect with an error message
        }

        // Pass the entity to the edit view
        return view('entities.edit', compact('entity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntityRequest $request, Entity $entity)
    {
        // Check if the entity belongs to the current user
        if ($entity->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.'); // Or redirect with an error message
        }

        // Validate the request data using the UpdateEntityRequest
        $validatedData = $request->validated();

        // Update the entity with the validated data
        $entity->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('entities.index')->with('success', 'Entity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entity $entity)
    {
        // Check if the entity belongs to the current user
        if ($entity->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.'); // Or redirect with an error message
        }

        // Delete the entity
        $entity->delete();

        // Redirect to the index page with a success message
        return redirect()->route('entities.index')->with('success', 'Entity deleted successfully.');
    }
}
