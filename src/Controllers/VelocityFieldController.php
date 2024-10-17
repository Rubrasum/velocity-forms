<?php

namespace Rubrasum\VelocityForms\Controllers;

use Rubrasum\VelocityForms\Models\VelocityField;
use Rubrasum\VelocityForms\Http\Requests\VelocityFieldStoreRequest;
use Rubrasum\VelocityForms\Http\Requests\VelocityFieldUpdateRequest;
use Inertia\Inertia;

class VelocityFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = VelocityField::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocityFields/Index', [
            'fields' => $fields
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/VelocityFields/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VelocityFieldStoreRequest $request)
    {
        $validated = $request->validated();

        // Store the field
        $field = VelocityField::create($validated);

        return redirect()->route('fields.index')->with('success', 'Field Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocityField $velocityField)
    {
        return Inertia::render('Admin/VelocityFields/View', [
            'field' => $velocityField
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocityField $velocityField)
    {
        return Inertia::render('Admin/VelocityFields/Edit', [
            'field' => $velocityField
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VelocityFieldUpdateRequest $request, VelocityField $velocityField)
    {
        $validated = $request->validated();

        // Update the field
        $velocityField->update($validated);

        return back()->with('success', 'Field Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocityField $velocityField)
    {
        $velocityField->delete();

        return back()->with('success', 'Field Deleted!');
    }
}
