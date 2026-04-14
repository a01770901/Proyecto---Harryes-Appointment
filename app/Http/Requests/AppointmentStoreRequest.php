<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'patient_name' => 'required', 'doctor' => 'required', 'date' => 'required', 'notes' => 'nullable', 'confirmed' => 'required', 'duration' => 'required'
        ];
    }
}
