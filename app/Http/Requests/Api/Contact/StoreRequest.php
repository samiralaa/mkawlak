<?php

namespace App\Http\Requests\Api\Contact;

use App\Http\Requests\Api\BaseFormRequest;

class StoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'email'   => 'required|max:255|email',
            'message' => 'required|string|max:500',
            'phone'   => 'required|numeric|integer',
        ];
    }
}
