<?php

namespace App\Http\Requests\Api\payment;

use App\Http\Requests\Api\BaseFormRequest;

class StorePaymentRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'payment_id' => 'required',
            'status'     => 'required',
            'company_id' => 'required|exists:companies,id',
        ];
    }
}
