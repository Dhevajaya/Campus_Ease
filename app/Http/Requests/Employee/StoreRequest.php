<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'position' => [
                'required',
            ],
            'image' => [
                'required',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama pegawai harus diisi',
            'phone.required' => 'Telepon pegawai harus diisi',
            'position.required' => 'Jabatan pegawai harus diisi',
            'image.image' => 'Foto harus berupa gambar',
            'image.mimes' => 'Foto harus berupa jpeg, bmp, png, gif, svg , jpg',
            'image.max' => 'Foto tidak boleh lebih dari 2MB',
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
            $this->redirect = route('dashboard.employees.create');
        }

        parent::failedValidation($validator);
    }
}
