<?php

namespace App\Http\Requests\Api\Project;

use App\Http\Requests\Api\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'customer_evaluation' => 'required|integer|numeric|min:1|max:5',
            'image'               => 'required|array',
            'image.*'             => 'required|image',
            'category_id'         => 'required|integer|numeric|exists:categories,id',
        ];
    }
}
