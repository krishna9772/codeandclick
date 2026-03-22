<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OurWorkRequest extends FormRequest
{
    private const WORK_TYPES = [
        'branding-solution',
        'brand-strategy',
        'consultancy-integration-and-culture',
        'brand-identity',
        'marketing-services',
        'marketing-strategy',
        'social-media',
        'search-engine-optimization',
        'digital-optimization',
        'media-and-press',
        'events-coverage-and-live-streaming',
        'creative-design',
        'website-and-social-media-content',
        'video-production',
        'motions',
        'photo-shooting',
        'mobile-app-development',
        'web-design',
    ];

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
                ? 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
                : 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',

            'content' => 'required|string',
            'serviceID' => 'required|exists:services,id',
            'type' => ['required', 'string', Rule::in(self::WORK_TYPES)],

            'workImages' => $this->routeIs('our-work.store') ? 'required|array|min:1' : 'nullable|array',
            'workImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'remove_work_images' => 'nullable|array',
            'remove_work_images.*' => 'integer|exists:media,id',
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
            'image.max' => 'The main image may not be greater than 5120 kilobytes.',

            'serviceID.required' => 'The service is required.',
            'serviceID.exists' => 'The selected service does not exist.',

            'content.required' => 'The content field is required.',
            'content.string' => 'The content must be a valid string.',

            'type.required' => 'The type field is required.',
            'type.in' => 'The selected type is invalid.',

            'workImages.required' => 'Please upload at least one work image.',
            'workImages.array' => 'Work images must be an array of files.',
            'workImages.min' => 'Please upload at least one work image.',
            'workImages.*.image' => 'Each work image must be an image.',
            'workImages.*.mimes' => 'Work images must be jpeg, png, jpg, or gif.',
            'workImages.*.max' => 'Each work image may not be greater than 5120 kilobytes.',
            'remove_work_images.array' => 'The removed work images format is invalid.',
            'remove_work_images.*.integer' => 'Each removed work image must be a valid id.',
            'remove_work_images.*.exists' => 'One or more selected work images do not exist.',
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
