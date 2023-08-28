<?php

namespace App\Http\Requests\Api\Post;

use App\Http\Requests\Api\BaseFormRequest;

class StoreRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'requirement' => 'required|string',
            'note'        => 'required|string',
            'client_type' => 'required|string|in:designer,contractor',
            'building_type'   => 'required|string|in:apartment,villa,office,commercial_project,building',
            'type_employment' => (request()->client_type == 'contractor')? 'required|string|in:new_construction,restoration,finishing,in' : 'required|string|in:in,out',
            'floors'        => 'required|numeric',
            'width'        => 'required|numeric',
            'length'        => 'required|numeric',
            'plan'        => 'required|string|in:plan,without_plan',
            //'space'       => 'required|integer|numeric',
            'image_plan'       => 'required_if:plan,==,plan|array',
            'image_plan.*'     => 'required_if:plan,==,plan|image',
            'image'       => 'required|array',
            'image.*'     => 'required|image',
            //'category_id' => 'required|integer|numeric|exists:categories,id',
        ];
    }
}


