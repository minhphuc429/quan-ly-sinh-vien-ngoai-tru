<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SinhVienRequest extends FormRequest
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
            'tensv' => 'required|unique:posts|max:255',
            'idsv' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required',
            'lop' => 'required',
            'sdt' => 'required',
            'email' => 'required',
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
            'tensv.required' => 'A title is required',
            'idsv.required'  => 'A message is required',
        ];
    }
}
