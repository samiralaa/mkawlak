<?php

namespace App\Http\Requests\Api\Auth\Company;

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
            'name'                         => 'required|string|max:255',
            'name_company'                 => 'required|string|max:255',
            'address'                      => 'required|string|max:255|min:6',
            'address_company'              => 'required|string|max:255',
            'email'                        => 'required|email|string|max:255|unique:companies,email',
            'id_personal'                  => 'required|integer|numeric',
            'commercial_register'          => 'required|integer|numeric',
            'password'                     => 'required|string|max:255||min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'        => 'required|min:6|max:255',
            'citys'                        => 'required|array',
            'majors'                       => 'required|array',
            'citys.*'                      => 'required|string',
            'majors.*'                     => 'required|string',
            'personal_photos'              => 'required|image',
            'id_photo'                     => 'required|image',
            'company_profile'              => 'required|mimes:pdf',
            'company_type'                 => 'required|in:designer,contractor',
            'commercial_registration_file' => 'required|mimes:pdf',
        ];
    }
}
