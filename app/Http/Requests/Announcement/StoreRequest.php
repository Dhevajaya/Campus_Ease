<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'fragment' => ['required'],
            'date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'cover' => [
                'required',
                'image',
                'max:2048',
                'mimes:jpeg,bmp,png,gif,svg,jpg',
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
            'cover.required' => 'Cover harus diisi',
            'cover.image' => 'Cover harus berupa gambar',
            'cover.mimes' => 'Cover harus berupa jpeg, bmp, png, gif, svg , jpg',
            'cover.max' => 'Cover tidak boleh lebih dari 2MB',
            'date.required' => 'Tanggal pengumuman harus diisi',
            'date.date_format' => 'Tanggal pengumuman tidak sesuai',
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
            $this->redirect = route('dashboard.announcements.create');
        }
        parent::failedValidation($validator);
    }
}
