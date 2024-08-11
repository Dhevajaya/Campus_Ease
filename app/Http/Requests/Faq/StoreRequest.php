<?php

namespace App\Http\Requests\Faq;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'questions' => [
                'required',
            ],
            'answer' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'questions.required' => 'Pertanyaan harus diisi',
            'answer.required' => 'Jawaban harus diisi',
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
            $this->redirect = route('dashboard.faq.create');
        }

        parent::failedValidation($validator);
    }
}
