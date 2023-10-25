<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhysicianRequest;
use App\Http\Requests\UpdatePhysicianRequest;
use App\Models\Physician;

class PhysicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $physicians = Physician::latest()->paginate(9);

        return view('physicians.index', \compact('physicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('physicians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhysicianRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->physicians()->create($validated);

        return redirect()->route('physicians.index')->with('success', 'Physician added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Physician $physician)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Physician $physician)
    {
        return view('physicians.edit', compact('physician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhysicianRequest $request, Physician $physician)
    {
        $validated = $request->validated();

        $physician->update($validated);

        return redirect()->route('physicians.index')->with('success', 'Physician updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Physician $physician)
    {
        if(!$physician) {
            return redirect()->route('physicians.index')->with('error', 'Physician not found!');
        }

        $physician->delete();

        return redirect()->route('physicians.index')->with('success', 'Physician deleted successfully!');
    }
}
