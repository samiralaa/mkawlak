<?php

namespace App\Http\Requests\Api\Auth\Company;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'                         => 'required|string|max:255',
            'name_company'                 => 'required|string|max:255',
            'address'                      => 'required|string|max:255',
            'address_company'              => 'required|string|max:255',
            'email'                        => 'required|email|string|max:255|unique:companies,email,' . auth('company')->id(),
            'id_personal'                  => 'required|integer|numeric',
            'commercial_register'          => 'required|integer|numeric',
            'password'                     => 'required|string|max:255|min:6',
            'personal_photos'              => 'nullable|image',
            'id_photo'                     => 'nullable|image',
            'company_profile'              => 'nullable|mimes:pdf',
            'commercial_registration_file' => 'nullable|mimes:pdf',
        ];
    }
}
