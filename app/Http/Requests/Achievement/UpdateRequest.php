<?php

namespace App\Http\Requests\Achievement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
            ],
            'image' => [
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deksripsi harus diisi',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        if (! $this->wantsJson()) {
            $errors = implode('<br>', $validator->errors()->all());
            alert()->html('Gagal',$errors,'error');
            $this->redirect = route('dashboard.achievements.edit', request()->route()->parameter('id'));
        }

        parent::failedValidation($validator);
    }
}
