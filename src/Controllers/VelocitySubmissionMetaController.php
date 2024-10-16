<?php

namespace Rubrasum\VelocityForms\Controllers;

use App\Models\VelocitySubmissionMeta;
use App\Http\Requests\VelocitySubmissionMetaStoreRequest;
use App\Http\Requests\VelocitySubmissionMetaUpdateRequest;
use Inertia\Inertia;

class VelocitySubmissionMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissionMeta = VelocitySubmissionMeta::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocitySubmissionMeta/Index', [
            'submissionMeta' => $submissionMeta
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/VelocitySubmissionMeta/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VelocitySubmissionMetaStoreRequest $request)
    {
        $validated = $request->validated();

        // Store the meta data
        $submissionMeta = VelocitySubmissionMeta::create($validated);

        return redirect()->route('submission-meta.index')->with('success', 'Submission Meta Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocitySubmissionMeta $velocitySubmissionMeta)
    {
        return Inertia::render('Admin/VelocitySubmissionMeta/View', [
            'submissionMeta' => $velocitySubmissionMeta
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocitySubmissionMeta $velocitySubmissionMeta)
    {
        return Inertia::render('Admin/VelocitySubmissionMeta/Edit', [
            'submissionMeta' => $velocitySubmissionMeta
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VelocitySubmissionMetaUpdateRequest $request, VelocitySubmissionMeta $velocitySubmissionMeta)
    {
        $validated = $request->validated();

        // Update the meta data
        $velocitySubmissionMeta->update($validated);

        return back()->with('success', 'Submission Meta Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocitySubmissionMeta $velocitySubmissionMeta)
    {
        $velocitySubmissionMeta->delete();

        return back()->with('success', 'Submission Meta Deleted!');
    }
}
