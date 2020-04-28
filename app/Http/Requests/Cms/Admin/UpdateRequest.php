<?php

namespace App\Http\Requests\Cms\Admin;

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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $this->route('admin'),
            'password' => 'bail|required_with:password_confirmation|confirmed',
            'role_ids' => 'min:1',
        ];
    }
}
