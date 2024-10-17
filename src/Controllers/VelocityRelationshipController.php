<?php

namespace Rubrasum\VelocityForms\Controllers;

use Rubrasum\VelocityForms\Models\VelocityRelationship;
use Rubrasum\VelocityForms\Http\Requests\VelocityRelationshipStoreRequest;
use Rubrasum\VelocityForms\Http\Requests\VelocityRelationshipUpdateRequest;
use Inertia\Inertia;

class VelocityRelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relationships = VelocityRelationship::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocityRelationships/Index', [
            'relationships' => $relationships
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/VelocityRelationships/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VelocityRelationshipStoreRequest $request)
    {
        $validated = $request->validated();

        // Store the relationship
        $relationship = VelocityRelationship::create($validated);

        return redirect()->route('relationships.index')->with('success', 'Relationship Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocityRelationship $velocityRelationship)
    {
        return Inertia::render('Admin/VelocityRelationships/View', [
            'relationship' => $velocityRelationship
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocityRelationship $velocityRelationship)
    {
        return Inertia::render('Admin/VelocityRelationships/Edit', [
            'relationship' => $velocityRelationship
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VelocityRelationshipUpdateRequest $request, VelocityRelationship $velocityRelationship)
    {
        $validated = $request->validated();

        // Update the relationship
        $velocityRelationship->update($validated);

        return back()->with('success', 'Relationship Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocityRelationship $velocityRelationship)
    {
        $velocityRelationship->delete();

        return back()->with('success', 'Relationship Deleted!');
    }
}
