<?php

namespace App\Http\Requests\Cms\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id = $this->route('user');
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($id, 'id')]
        ];
    }
}
