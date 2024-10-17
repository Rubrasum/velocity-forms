<?php

namespace Rubrasum\VelocityForms\Controllers;

use Rubrasum\VelocityForms\Models\VelocityForm;
use Rubrasum\VelocityForms\Http\Requests\VelocityFormStoreRequest;
use Rubrasum\VelocityForms\Http\Requests\VelocityFormUpdateRequest;
use Inertia\Inertia;

class VelocityFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = VelocityForm::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocityForms/Index', [
            'forms' => $forms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/VelocityForms/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VelocityFormStoreRequest $request)
    {
        $validated = $request->validated();

        // Store the form
        $form = VelocityForm::create($validated);

        return redirect()->route('forms.index')->with('success', 'Form Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocityForm $velocityForm)
    {
        return Inertia::render('Admin/VelocityForms/View', [
            'form' => $velocityForm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocityForm $velocityForm)
    {
        return Inertia::render('Admin/VelocityForms/Edit', [
            'form' => $velocityForm
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VelocityFormUpdateRequest $request, VelocityForm $velocityForm)
    {
        $validated = $request->validated();

        // Update the form
        $velocityForm->update($validated);

        return back()->with('success', 'Form Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocityForm $velocityForm)
    {
        $velocityForm->delete();

        return back()->with('success', 'Form Deleted!');
    }
}
