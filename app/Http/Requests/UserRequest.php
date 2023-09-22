<?php

namespace App\Http\Requests;

use App\Library\Auth\LocalRole;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'         => 'required|email',
            'password'      => 'required|min:6',
            'role'          => 'required|string',
            'stationId'     => ($this->request->get('role') === LocalRole::ROLE_POLICE_OFFICER || $this->request->get('role') === LocalRole::ROLE_INVESTIGATOR)? 'required|int' : 'sometimes|int',
        ];
    }
}
