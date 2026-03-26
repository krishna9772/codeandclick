<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
{
    protected $errorBag = 'enquiry';

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
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'business_name' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'location' => 'required|string',
            'hear_about_us' => 'nullable|string|max:255',
            'budget' => 'required|string',
            'about_project' => 'required|string|max:5000',
            'service_looking_for' => 'required|array|min:1',
            'service_looking_for.*' => 'string|max:255',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'first_name' => trim((string) $this->input('first_name', '')),
            'last_name' => trim((string) $this->input('last_name', '')),
            'email' => trim((string) $this->input('email', '')),
            'business_name' => trim((string) $this->input('business_name', '')),
            'business_type' => trim((string) $this->input('business_type', '')),
            'phone' => trim((string) $this->input('phone', '')),
            'website' => trim((string) $this->input('website', '')),
            'location' => trim((string) $this->input('location', '')),
            'hear_about_us' => trim((string) $this->input('hear_about_us', '')),
            'budget' => trim((string) $this->input('budget', '')),
            'about_project' => trim((string) $this->input('about_project', '')),
        ]);
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter your first name.',
            'last_name.required' => 'Please enter your last name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'business_name.required' => 'Please enter your business name.',
            'business_type.required' => 'Please enter your business type.',
            'phone.required' => 'Please enter your phone number.',
            'location.required' => 'Please select your location.',
            'budget.required' => 'Please select a budget.',
            'about_project.required' => 'Please enter your message.',
            'service_looking_for.required' => 'Please select at least one service.',
            'service_looking_for.min' => 'Please select at least one service.',
        ];
    }
}
