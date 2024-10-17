<?php

namespace Rubrasum\VelocityForms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocityObjectStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false; // Authorize all requests for now
    }

    public function rules(): array
    {
        return [
            'object_type' => 'required|string|max:255', // Object type (form, field, action, etc.)
            'object_id' => 'required|integer', // ID of the object being referenced
            'parent_id' => 'nullable|integer|exists:velocity_forms,id', // Optional parent object (form)
        ];
    }
}
