<?php

namespace App\Http\Requests\Api\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'payment_method' => 'required|exists:payment_methods|numeric',
            'shipping_method' => 'required|exists:shipping_methods|numeric',
            'address1'=>'required',
            'address2'=>'required',
            'phone'=>'required',
        ];
    }
}
