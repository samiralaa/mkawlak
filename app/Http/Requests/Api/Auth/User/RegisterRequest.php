<?php

namespace App\Http\Requests\Api\Auth\User;

use App\Http\Requests\Api\BaseFormRequest;

class RegisterRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|string|max:255|unique:users,email',
            'address'               => 'required|string|max:255|min:6',
            'id_personal'           => 'required|integer|numeric',
            'personal_photos'       => 'required|image',
            'id_photo'              => 'required|image',
            'password'              => 'required|string|max:255||min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6|max:255'
        ];
    }
}
