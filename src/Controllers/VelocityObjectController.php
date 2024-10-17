<?php

namespace Rubrasum\VelocityForms\Controllers;

use Rubrasum\VelocityForms\Models\VelocityObject;
use Rubrasum\VelocityForms\Http\Requests\VelocityObjectStoreRequest;
use Rubrasum\VelocityForms\Http\Requests\VelocityObjectUpdateRequest;
use Inertia\Inertia;

class VelocityObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objects = VelocityObject::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocityObjects/Index', [
            'objects' => $objects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/VelocityObjects/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VelocityObjectStoreRequest $request)
    {
        $validated = $request->validated();

        // Store the object
        $object = VelocityObject::create($validated);

        return redirect()->route('objects.index')->with('success', 'Object Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocityObject $velocityObject)
    {
        return Inertia::render('Admin/VelocityObjects/View', [
            'object' => $velocityObject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocityObject $velocityObject)
    {
        return Inertia::render('Admin/VelocityObjects/Edit', [
            'object' => $velocityObject
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VelocityObjectUpdateRequest $request, VelocityObject $velocityObject)
    {
        $validated = $request->validated();

        // Update the object
        $velocityObject->update($validated);

        return back()->with('success', 'Object Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocityObject $velocityObject)
    {
        $velocityObject->delete();

        return back()->with('success', 'Object Deleted!');
    }
}
