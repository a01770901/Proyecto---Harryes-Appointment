<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
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
            'patient_name' => 'sometimes|required', 'doctor' => 'sometimes|required', 'date' => 'sometimes|required', 'notes' => 'nullable', 'confirmed' => 'sometimes|required', 'duration' => 'sometimes|required'
        ];
    }
}