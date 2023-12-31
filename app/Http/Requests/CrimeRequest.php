<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrimeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'crimeType'         => 'required|string',
            'location'          => 'required|string',
            'description'       => 'required|string',
            'reportedBy'        => 'required|int',
            'witnessedBy'       => 'required|string',
            'criminalId'        => 'required|int',
            'investigatorId'   => 'required|int'
        ];
    }
}
