<?php

namespace Rubrasum\VelocityForms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocityObjectUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false; // Authorize all requests for now
    }

    public function rules(): array
    {
        return [
            'object_type' => 'required|string|max:255', // Object type
            'object_id' => 'required|integer', // ID of the object
            'parent_id' => 'nullable|integer|exists:velocity_forms,id', // Optional parent form
        ];
    }
}
