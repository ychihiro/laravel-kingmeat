<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KingmeatRequest extends FormRequest
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
            'price' => 'required|numeric',
            'calorie' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'price.required' => '金額を入力してください',
            'price.numeric' => '数値で入力してください',
            'calorie.required' => 'カロリーを入力してください',
            'calorie.numeric' => '数値で入力してください'
        ];
    }
}
