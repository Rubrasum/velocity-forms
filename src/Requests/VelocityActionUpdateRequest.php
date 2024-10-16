<?php

namespace Rubrasum\VelocityForms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocityActionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false; // Authorize all requests for now
    }

    public function rules(): array
    {
        return [
            'form_id' => 'required|exists:velocity_forms,id', // Ensure form exists
            'key' => 'required|string|max:255|unique:velocity_actions,key,' . $this->velocity_action->id, // Ensure uniqueness but allow current action
            'settings' => 'required|json', // Action settings must be JSON
        ];
    }
}
