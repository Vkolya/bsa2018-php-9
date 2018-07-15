<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCurrencyRequest extends FormRequest
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
                'title' => 'required|max:255',
                'short_name' => 'required|max:10|min:2',
                'logo_url' => 'required|url|active_url',
                'price' => 'required|numeric|min:0',
        ];
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'price.min' => 'The price must be at least 0.',
        'price.numeric' => 'The price must be a number.',
    ];
}
}
