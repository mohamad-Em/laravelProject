<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'postTitle' => 'required|string|unique:post,postTitle',
            'postDecraption' => 'required|string|unique:post,postDecraption',
        ];
    }
    public function message()
    {
        return [
            'postTitle.required' => 'Enter The postTitle',
            'postDecraption.required' => 'Enter The postDecraption',
            'postTitle.string' => 'Enter The Test',
            'postDecraption.string' => 'Enter The Test',
            'postTitle.unique' => 'The Post Title Has Already Been Taken.',
            'postDecraption.unique' => 'The Post Descraption Has Already Been Taken.',
        ];
    }
}
