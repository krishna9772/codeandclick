<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCareerRequest extends FormRequest
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
            'title_mm' => 'nullable|string|max:255',
            'ignite' => 'required|string',
            'ignite_mm' => 'nullable|string',
            'role' => 'required|string',
            'role_mm' => 'nullable|string',
            'benefits' => 'required|string',
            'benefits_mm' => 'nullable|string',
            'requirements' => 'required|string',
            'requirements_mm' => 'nullable|string',
            'responsibilities' => 'required|string',
            'responsibilities_mm' => 'nullable|string',
            'salary' => 'required|numeric|min:0',
            'location' => ['required', 'string', Rule::in(config('base.location'))],
        ];
    }

    /**
     * Get the custom error messages for validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'ignite.required' => 'The ignite field is required.',
            'role.required' => 'The role field is required.',
            'benefits.required' => 'The benefits field is required.',
            'requirements.required' => 'The requirements field is required.',
            'responsibilities.required' => 'The responsibilities field is required.',
            'salary.required' => 'The salary field is required.',
            'salary.numeric' => 'The salary must be a valid number.',
            'salary.min' => 'The salary must be at least 0.',
            'location.required' => 'The location field is required.',
            'location.in' => 'The selected location is invalid.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException(
            $validator,
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}
