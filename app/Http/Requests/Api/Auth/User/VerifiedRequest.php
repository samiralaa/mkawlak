<?php

namespace App\Http\Requests\Api\Auth\User;

use App\Http\Requests\Api\BaseFormRequest;

class VerifiedRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|integer|numeric|digits:6|exists:users,code'
        ];
    }
}
