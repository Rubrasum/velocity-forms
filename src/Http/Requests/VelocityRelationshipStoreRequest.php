<?php

namespace Rubrasum\VelocityForms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocityRelationshipStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false; // Authorize all requests for now
    }

    public function rules(): array
    {
        return [
            'parent_object_id' => 'required|exists:velocity_objects,id', // Ensure parent object exists
            'child_object_id' => 'required|exists:velocity_objects,id', // Ensure child object exists
        ];
    }
}
