<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'max:255',
            'layout' => 'required',
            ///@todo create route validation Route::has('example')
            'slug' => ['required', 'unique:businesses', 'max:255', 'regex:/^[\w\-+ *_\d]+$/i'],
//            'services' => 'required',
        ];
    }
}
