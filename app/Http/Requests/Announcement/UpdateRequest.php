<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'fragment' => ['required'],
            'cover' => [
                'nullable',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
            ],
            'date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'published_at' => [
                'required',
                'date_format:Y-m-d H:i:s',
            ],
            'announcement-trixFields' => [
                'required',
                'array',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul harus diisi',
            'fragment.required' => 'Penggalan konten harus diisi',
            'cover.image' => 'Cover harus berupa gambar',
            'cover.mimes' => 'Cover harus berupa jpeg, bmp, png, gif, svg , jpg',
            'cover.max' => 'Cover tidak boleh lebih dari 2MB',
            'date.required' => 'Tanggal Beasiswa harus diisi',
            'date.date_format' => 'Tanggal Beasiswa tidak sesuai',
            'published_at.required' => 'Tanggal publikasi harus diisi',
            'published_at.date_format' => 'Tanggal publikasi tidak sesuai',
            'announcement-trixFields.required' => 'Konten harus diisi',
            'announcement-trixFields.array' => 'Konten tidak valid',
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
            $this->redirect = route('dashboard.announcements.edit', request()->route()->parameter('id'));
        }
        parent::failedValidation($validator);
    }
}
