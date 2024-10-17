<?php

namespace Rubrasum\VelocityForms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocitySubmissionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false; // Authorize all requests for now
    }

    public function rules(): array
    {
        return [
            'form_id' => 'required|exists:velocity_forms,id', // Ensure form exists
            'user_id' => 'nullable|exists:users,id', // If submission is tied to a user
            'status' => 'required|string|max:255', // Status of the submission
        ];
    }
}
