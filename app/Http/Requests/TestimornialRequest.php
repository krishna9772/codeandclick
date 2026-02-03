<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimornialRequest extends FormRequest
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
            'image' => $this->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg,gif|max:5048' : 'image|mimes:jpeg,png,jpg,gif|max:5048',
            'name' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 5 MB.',
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
        ];
    }
}
