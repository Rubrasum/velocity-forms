<?php

namespace Rubrasum\VelocityForms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VelocityFieldStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow all users for now, modify this for your authorization logic
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'form_id' => 'required|exists:velocity_forms,id', // Ensure form exists
            'key' => 'required|string|unique:velocity_fields,key|max:255', // Field key should be unique
            'type' => 'required|string|max:255', // Field type, e.g., text, email, etc.
            'order' => 'nullable|integer', // Optional field order
        ];
    }
}
