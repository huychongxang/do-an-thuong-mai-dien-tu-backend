<?php

namespace App\Http\Requests\Cms\ShippingStatus;

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
            'name' => 'required|unique:shipping_statuses,name,' . $this->route('shipping_status'),
            'label' => 'required|unique:shipping_statuses,label,' . $this->route('shipping_status'),
        ];
    }
}
