<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'message' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'message.required' => 'Pesan harus diisi',
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
            $this->redirect = route('landing-page.contact.index');
        }

        parent::failedValidation($validator);
    }
}
