<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'ignite' => 'required|string',
            'role' => 'required|string',
            'benefits' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
        ];
    }
}
