<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'userEmail' => 'required',
            'userPassword' => 'required',
        ];
    }
    public function message()
    {
        return [
            'userEmail.required' => 'Enter The Email',
            'userPassword.required' => 'Enter The Password',
        ];
    }
}
