<?php

namespace Rubrasum\VelocityForms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocitySubmissionMetaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false; // Authorize all requests for now
    }

    public function rules(): array
    {
        return [
            'parent_id' => 'required|exists:velocity_submissions,id', // Ensure the submission exists
            'key' => 'required|string|max:255', // Meta key (field name)
            'value' => 'required|string', // Meta value (user input)
        ];
    }
}
