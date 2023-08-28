<?php

namespace App\Http\Requests\Api\Project;

use App\Http\Requests\Api\BaseFormRequest;

class UpdateRequest extends BaseFormRequest
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
            'city'                => 'required|string|max:255',
            'description'         => 'required|string',
            'project_duration'    => 'required|integer|numeric',
            'customer_evaluation' => 'required|integer|numeric',
            'image'               => 'required|array',
            'image.*'             => 'required|image',
            'category_id'         => 'required|integer|numeric|exists:categories,id',
        ];
    }
}
