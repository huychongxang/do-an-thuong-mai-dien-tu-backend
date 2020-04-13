<?php

namespace App\Http\Requests\Cms\OrderStatus;

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
            'name' => 'required|unique:order_statuses,name,' . $this->route('order_status'),
            'label' => 'required|unique:order_statuses,label,' . $this->route('order_status'),
        ];
    }
}
