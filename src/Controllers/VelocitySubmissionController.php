<?php

namespace Rubrasum\VelocityForms\Controllers;

use Rubrasum\VelocityForms\Models\VelocitySubmission;
use Rubrasum\VelocityForms\Http\Requests\VelocitySubmissionStoreRequest;
use Rubrasum\VelocityForms\Http\Requests\VelocitySubmissionUpdateRequest;
use Inertia\Inertia;

class VelocitySubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = VelocitySubmission::latest('created_at')->paginate(10)->withQueryString();

        return Inertia::render('Admin/VelocitySubmissions/Index', [
            'submissions' => $submissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/VelocitySubmissions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VelocitySubmissionStoreRequest $request)
    {
        $validated = $request->validated();

        // Store the submission
        $submission = VelocitySubmission::create($validated);

        return redirect()->route('submissions.index')->with('success', 'Submission Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VelocitySubmission $velocitySubmission)
    {
        return Inertia::render('Admin/VelocitySubmissions/View', [
            'submission' => $velocitySubmission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelocitySubmission $velocitySubmission)
    {
        return Inertia::render('Admin/VelocitySubmissions/Edit', [
            'submission' => $velocitySubmission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VelocitySubmissionUpdateRequest $request, VelocitySubmission $velocitySubmission)
    {
        $validated = $request->validated();

        // Update the submission
        $velocitySubmission->update($validated);

        return back()->with('success', 'Submission Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelocitySubmission $velocitySubmission)
    {
        $velocitySubmission->delete();

        return back()->with('success', 'Submission Deleted!');
    }
}
