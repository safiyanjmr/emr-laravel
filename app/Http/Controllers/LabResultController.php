<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabResultRequest;
use App\Http\Requests\UpdateLabResultRequest;
use App\Models\LabResult;
use App\Models\Patient;
use App\Models\Physician;

class LabResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = LabResult::latest()->paginate(9);

        return view('lab-results.index', \compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::get();
        $physicians = Physician::get();
        $lab_results = LabResult::get();

        return view('lab-results.create', [

            'patients' => $patients,
            'physicians' => $physicians,
            'lab_results' => $lab_results,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLabResultRequest $request)
    {
        $validated = $request->validated();

//        dd($validated);

        $validated['user_id'] = auth()->id();

        LabResult::create($validated);

        return redirect()->route('lab-results.index')->with('success', 'Lab Result added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LabResult $labResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LabResult $labResult)
    {
        $patients = Patient::all();

        return view('lab-results.edit', compact('labResult', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLabResultRequest $request, LabResult $labResult)
    {
        $validated = $request->validated();

//        dd($validated);

        $validated['user_id'] = auth()->id();

        $labResult->update($validated);

        return redirect()->route('lab-results.index')->with('success', 'Lab Result updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LabResult $result)
    {
        if(!$result) {
            return redirect()->route('lab-results.index')->with('error', 'Lab Result not found!');
        }

        $result->delete();

        return redirect()->route('lab-results.index')->with('success', 'Lab Result deleted successfully!');
    }
}
