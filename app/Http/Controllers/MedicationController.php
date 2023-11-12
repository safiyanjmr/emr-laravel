<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicationsRequest;
use App\Http\Requests\UpdateMedicationsRequest;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Physician;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medications = Medication::latest()->paginate(10);

        return view('medications.index', compact('medications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::get();
        $physicians = Physician::get();

        return view('medications.create', [
            'patients' => $patients,
            'physicians' => $physicians,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicationsRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        Medication::create($validated);

        return redirect()->route('medications.index')->with('success', 'Medication added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medication $medication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medication $medication)
    {
        return view('medications.edit', compact('medication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationsRequest $request, Medication $medication)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $medication->update($validated);

        return redirect()->route('medications.index')->with('success', 'Medication updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
        if(!$medication) {
            return redirect()->route('medications.index')->with('error', 'Medication not found!');
        }

        $medication->delete();

        return redirect()->route('medications.index')->with('success', 'Medication deleted successfully!');
    }
}
