<?php

namespace App\Http\Requests\Api\Auth\User;

use App\Http\Requests\Api\BaseFormRequest;

class LoginRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|exists:users,email|email|string|max:255',
            'password' => 'required|string|max:255'
        ];
    }
}
