<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabResultRequest extends FormRequest
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
            'test_name' => 'required|string|max:50',
            'result'  => 'required|string|max:50',
            'test_date' => 'required|date|max:50',
            'physician_comments'  => 'required|string|max:50',
            'patient_id' => 'required',
        ];
    }
}
