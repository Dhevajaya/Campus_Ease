<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                Rule::unique('users')->ignore(request()->route()->parameter('id'))->whereNull('deleted_at'),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(request()->route()->parameter('id'))->whereNull('deleted_at'),
            ],
            'name' => [
                'required',
            ],
            'roles' => [
                'required',
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore(request()->route()->parameter('id'))->whereNull('deleted_at'),
            ],
            'status' => [
                'required',
            ],
            'avatar' => [
                'nullable',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
            'password' => [
                'nullable',
                'confirmed',
                'min:8',
            ],
            'email_verified_at' => [
                'date_format:Y-m-d H:i:s'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email tidak boleh kosong',
            'email.string' => 'Email harus berupa string',
            'email.email' => 'Email harus berupa email',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'avatar.image' => 'Foto harus berupa gambar',
            'avatar.mimes' => 'Foto harus berupa jpeg, bmp, png, gif, svg , jpg',
            'avatar.max' => 'Foto tidak boleh lebih dari 2MB',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama',
            'roles.required' => 'Role tidak boleh kosong',
            'phone.required' => 'Phone tidak boleh kosong',
            'phone.unique' => 'Phone sudah terdaftar',
            'email_verified_at.date_format' => 'Format verifikasi email at tidak sesuai',
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
            $this->redirect = route('dashboard.users.edit', request()->route()->parameter('id'));
        }
        
        parent::failedValidation($validator);
    }
}
