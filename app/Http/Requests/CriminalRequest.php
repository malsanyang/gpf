<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriminalRequest extends FormRequest
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
            'firstName'     => 'required|string',
            'lastName'      => 'required|string',
            'address'       => 'required|string',
            'telephoneNo'   => 'required|string',
            'dob'           => 'required|date',
        ];
    }
}
