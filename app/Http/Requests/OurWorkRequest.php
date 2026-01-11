<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurWorkRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',

            'image' => $this->routeIs('our-work.store')
                ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'content' => 'required|string',
            'serviceID' => 'required|exists:services,id',

            // multiple images
            'workImages' => $this->routeIs('our-work.store') ? 'required|array' : 'nullable|array',
            'workImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a valid string.',
            'title.max' => 'The title may not be greater than 255 characters.',

            'image.required' => 'The main image is required.',
            'image.image' => 'The main image must be an image file.',
            'image.mimes' => 'The main image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The main image may not be greater than 2MB.',

            'serviceID.required' => 'The service is required.',
            'serviceID.exists' => 'The selected service does not exist.',

            'content.required' => 'The content field is required.',
            'content.string' => 'The content must be a valid string.',

            'workImages.required' => 'Please upload at least one work image.',
            'workImages.array' => 'Work images must be an array of files.',
            'workImages.*.image' => 'Each work image must be an image.',
            'workImages.*.mimes' => 'Work images must be jpeg, png, jpg, or gif.',
            'workImages.*.max' => 'Each work image may not be greater than 2MB.',
        ];
    }


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
