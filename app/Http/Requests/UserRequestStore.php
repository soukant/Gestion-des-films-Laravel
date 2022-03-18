<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestStore extends FormRequest
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
            'user.name' => 'required',
            'user.email' => 'required|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'the :attribute is required.',
            'email.required' => 'the :attribute is required.',
            'email.email' => 'the :attribute is invalid.',
        ];
    }
}
