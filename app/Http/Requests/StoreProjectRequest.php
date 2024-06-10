<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'giturl' => 'required|url',
            'type_id' => 'required|integer|exists:types,id', // Ensure this references the correct table
            'technologies' => 'array',
            'technologies.*' => 'integer|exists:technologies,id' // Ensure this references the correct table

        ];
    }
}
