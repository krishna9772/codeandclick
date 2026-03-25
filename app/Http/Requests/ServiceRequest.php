<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'name_mm' => 'nullable|string|max:255',
            'image' => $this->routeIs('services.store') ? 'required|image|mimes:jpeg,png,jpg,gif|max:5120' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title' => 'required|string|max:255',
            'title_mm' => 'nullable|string|max:255',
            'main_content' => 'required|string',
            'main_content_mm' => 'nullable|string',
            'tags' => 'required|string',
            'tags_mm' => 'nullable|string',
            'sub_content' => 'required|string',
            'sub_content_mm' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 5120 kilobytes.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'main_content.required' => 'The main content field is required.',
            'tags.required' => 'The tags field is required.',
            'sub_content.required' => 'The sub content field is required.',
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
