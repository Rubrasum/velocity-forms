<?php

namespace Rubrasum\VelocityForms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocityActionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false; // Authorize all requests for now
    }

    public function rules(): array
    {
        return [
            'form_id' => 'required|exists:velocity_forms,id', // Ensure form exists
            'key' => 'required|string|unique:velocity_actions,key|max:255', // Unique action key
            'settings' => 'required|json', // Action settings must be JSON
        ];
    }
}
