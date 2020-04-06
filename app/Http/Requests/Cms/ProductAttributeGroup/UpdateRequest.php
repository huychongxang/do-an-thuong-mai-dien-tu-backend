<?php

namespace App\Http\Requests\Cms\ProductAttributeGroup;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:product_attribute_groups,name,' . $this->route('product_attribute_group'),
            'code' => 'required|unique:product_attribute_groups,code,' . $this->route('product_attribute_group'),
        ];
    }
}
