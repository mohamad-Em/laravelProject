<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'userName' => 'required|string',
            'userEmail' => 'required|unique:user,userEmail',
            'userPassword' => 'required|min:5|max:9',
            'userFullname' => 'required',
        ];
    }
    public function message()
    {
        return $message =  [
        'userName.required' => 'Enter The Name',
        'userEmail.required' => 'Enter The Email',
        'userEmail.unique' => 'The User Email Has Already Been Taken.',
        'userPassword.required' => 'Enter The Password',
        'userFullname.required' => 'Enter The Fullname',

        ];
    }
}
