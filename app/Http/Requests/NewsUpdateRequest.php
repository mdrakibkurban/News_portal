<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'category_id' => 'required',
            'district_id' => 'required',
            'news_en'     => 'required',
            'news_bn'     => 'required',
            'des_en'     => 'required',
            'des_bn'      => 'required',
            'image'       => 'nullable|sometimes|image',
            'status'      => 'required',
        ];
    }
}
