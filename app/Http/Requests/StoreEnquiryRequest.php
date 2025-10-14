<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'business_name' => 'nullable|string|max:255',
            'business_type' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'location' => 'required|string',
            'hear_about_us' => 'required|string',
            'budget' => 'required|string',
            'about_project' => 'required|string',
            'service_looking_for' => 'required|array',
        ];
    }
}
