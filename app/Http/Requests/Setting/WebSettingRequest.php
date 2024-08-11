<?php

namespace App\Http\Requests\Setting;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class WebSettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'website_logo' => [
                'nullable',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
            'website_logo_dark' => [
                'nullable',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
            'website_name' => [
                'required',
                'max:255',
            ],
            'website_keywords' => [
                'required',
                'max:255',
            ],
            'website_description' => [
                'required',
                'max:255',
            ],
            'website_phone' => [
                'required',
                'max:255',
            ],
            'website_address' => [
                'required',
                'max:255',
            ],
            'website_email' => [
                'required',
                'max:255',
                'email',
            ],
            'principal_name' => [
                'required',
                'max:255',
            ],
            'principal_welcome' => [
                'required',
            ],
            'principal_avatar' => [
                'nullable',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
            'home_banner' => [
                'nullable',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'website_logo.image' => 'Logo website harus berupa gambar',
            'website_logo.mimes' => 'Logo website harus berupa jpeg, bmp, png, gif, svg , jpg',
            'website_logo.max' => 'Logo website tidak boleh lebih dari 2MB',
            'website_name.required' => 'Nama website harus diisi.',
            'website_name.max' => 'Nama website maksimal 255 karakter.',
            'website_keywords.required' => 'Keywords website harus diisi.',
            'website_keywords.max' => 'Keywords website maksimal 255 karakter.',
            'website_description.required' => 'Deskripsi website harus diisi.',
            'website_description.max' => 'Deskripsi website maksimal 255 karakter.',
            'website_phone.required' => 'Nomor telepon website harus diisi.',
            'website_phone.max' => 'Nomor telepon website maksimal 255 karakter.',
            'website_address.required' => 'Alamat website harus diisi.',
            'website_address.max' => 'Alamat website maksimal 255 karakter.',
            'website_email.required' => 'Email website harus diisi.',
            'website_email.max' => 'Email website maksimal 255 karakter.',
            'website_email.email' => 'Email website tidak valid.',
            'principal_name.required' => 'Nama kepala sekolah harus diisi.',
            'principal_name.max' => 'Nama kepala sekolah maksimal 255 karakter.',
            'principal_welcome.required' => 'Sambutan kepala sekolah harus diisi.',
            'principal_avatar.image' => 'Foto kepala sekolah harus berupa gambar',
            'principal_avatar.mimes' => 'Foto kepala sekolah harus berupa jpeg, bmp, png, gif, svg , jpg',
            'principal_avatar.max' => 'Foto kepala sekolah tidak boleh lebih dari 2MB',
            'home_banner.image' => 'Foto banner home harus berupa gambar',
            'home_banner.mimes' => 'Foto banner home harus berupa jpeg, bmp, png, gif, svg , jpg',
            'home_banner.max' => 'Foto banner home tidak boleh lebih dari 2MB',
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
            $this->redirect = route('dashboard.settings.web.index');
        }
        
        parent::failedValidation($validator);
    }
}
