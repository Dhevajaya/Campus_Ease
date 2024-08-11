<?php

namespace App\Http\Requests\Page;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'published_at' => [
                'required',
                'date_format:Y-m-d H:i:s',
            ],
            'page-trixFields' => [
                'required',
                'array',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul harus diisi',
            'published_at.required' => 'Tanggal publikasi harus diisi',
            'published_at.date_format' => 'Tanggal publikasi tidak sesuai',
            'page-trixFields.required' => 'Konten harus diisi',
            'page-trixFields.array' => 'Konten tidak valid',
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
            $this->redirect = route('dashboard.pages.create');
        }
        parent::failedValidation($validator);
    }
}
