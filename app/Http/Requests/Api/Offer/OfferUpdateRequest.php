<?php

namespace App\Http\Requests\Api\Offer;

use App\Http\Requests\Api\BaseFormRequest;

class OfferUpdateRequest extends BaseFormRequest
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
            'price'             => 'required|numeric',
            'expected_duration' => 'required|numeric',
            'Work_details'      => 'required|string',
            'note'              => 'nullable|string',
            'post_id'           => 'required|integer|numeric|exists:posts,id',
        ];
    }
}
