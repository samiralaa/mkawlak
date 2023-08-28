<?php

namespace App\Http\Requests\Api\Auth\User;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\BaseFormRequest;

class UpdateRequest extends BaseFormRequest
{
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->password) {
            $this->merge([
                'password' => Hash::make($this->password)
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|string|max:255|unique:users,email,' . auth('api')->id(),
            'address'         => 'required|string|max:255',
            'id_personal'     => 'required|integer|numeric',
            'personal_photos' => 'nullable|image',
            'id_photo'        => 'nullable|image',
            'password'        => 'nullable|string|max:255',
        ];
    }
}
