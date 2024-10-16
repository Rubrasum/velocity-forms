<?php

namespace Rubrasum\VelocityForms\Controllers;

use App\Models\VelocityFormMeta;
use App\Models\VelocityForm;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VelocityFormMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metas = VelocityFormMeta::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocityFormMeta/Index', [
            'metas' => $metas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $forms = VelocityForm::all();

        return Inertia::render('Admin/VelocityFormMeta/Create', [
            'forms' => $forms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'required|exists:velocity_forms,id',
            'key' => 'required|string|max:255',
            'value' => 'required',
        ]);

        $meta = VelocityFormMeta::create($validated);

        return Inertia::render('Admin/VelocityFormMeta/Edit', [
            'meta' => $meta,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocityFormMeta $velocityFormMeta)
    {
        $forms = VelocityForm::all();

        return Inertia::render('Admin/VelocityFormMeta/View', [
            'meta' => $velocityFormMeta,
            'forms' => $forms,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocityFormMeta $velocityFormMeta)
    {
        $forms = VelocityForm::all();

        return Inertia::render('Admin/VelocityFormMeta/Edit', [
            'meta' => $velocityFormMeta,
            'forms' => $forms,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VelocityFormMeta $velocityFormMeta)
    {
        $data = $request->validate([
            'parent_id' => 'required|exists:velocity_forms,id',
            'key' => 'required|string|max:255',
            'value' => 'required',
        ]);

        $velocityFormMeta->update($data);

        return back()->with('success', 'Meta Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocityFormMeta $velocityFormMeta)
    {
        $velocityFormMeta->delete();

        return back()->with('success', 'Meta Deleted!');
    }
}
