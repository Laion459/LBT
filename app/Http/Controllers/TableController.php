<?php

namespace App\Http\Controllers;

use App\Models\TableControl;
use App\Http\Requests\StoreTableControlRequest;
use App\Http\Requests\UpdateTableControlRequest;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tableControls = TableControl::where('user_id', Auth::id())->get();
        return view('table_control.index', compact('tableControls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('table_control.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableControlRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();

        TableControl::create($validatedData);

        return redirect()->route('table_control.index')->with('success', 'Data added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TableControl $tableControl)
    {
        return view('table_control.show', compact('tableControl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TableControl $tableControl)
    {
        return view('table_control.edit', compact('tableControl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableControlRequest $request, TableControl $tableControl)
    {
        $validatedData = $request->validated();

        $tableControl->update($validatedData);

        return redirect()->route('table_control.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TableControl $tableControl)
    {
        $tableControl->delete();

        return redirect()->route('table_control.index')->with('success', 'Data deleted successfully.');
    }
}
