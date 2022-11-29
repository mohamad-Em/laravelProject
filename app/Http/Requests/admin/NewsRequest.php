<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'newsTitle' => 'required|string|unique:news,newsTitle',
            'newsDescraption' => 'required|string|unique:news,newsDescraption',
        ];
    }
    public function message()
    {
        return [
            'newTitle.required' => 'Enter The newTitle',
            'newsDescraption.required' => 'Enter The newsDescraption',
            'newTitle.string' => 'Enter The Test',
            'newsDescraption.string' => 'Enter The Test',
            'newTitle.unique' => 'The News Title Has Already Been Taken.',
            'newsDescraption.unique' => 'The News Descraption Has Already Been Taken.',
        ];
    }
}
