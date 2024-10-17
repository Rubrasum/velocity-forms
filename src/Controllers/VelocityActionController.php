<?php

namespace Rubrasum\VelocityForms\Controllers;

use Rubrasum\VelocityForms\Models\VelocityAction;
use Rubrasum\VelocityForms\Http\Requests\VelocityActionStoreRequest;
use Rubrasum\VelocityForms\Http\Requests\VelocityActionUpdateRequest;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class VelocityActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = VelocityAction::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocityActions/Index', [
            'actions' => $actions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/VelocityActions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VelocityActionStoreRequest $request)
    {
        $validated = $request->validated();

        // Store the action
        $action = VelocityAction::create($validated);

        return redirect()->route('actions.index')->with('success', 'Action Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocityAction $velocityAction)
    {
        return Inertia::render('Admin/VelocityActions/View', [
            'action' => $velocityAction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocityAction $velocityAction)
    {
        return Inertia::render('Admin/VelocityActions/Edit', [
            'action' => $velocityAction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VelocityActionUpdateRequest $request, VelocityAction $velocityAction)
    {
        $validated = $request->validated();

        // Update the action
        $velocityAction->update($validated);

        return back()->with('success', 'Action Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocityAction $velocityAction)
    {
        $velocityAction->delete();

        return back()->with('success', 'Action Deleted!');
    }
}
