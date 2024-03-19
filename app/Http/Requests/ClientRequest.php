<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => 'required',
            'email'     => 'required|email',
            'telephone' => 'required|regex:/^\d{3}-\d{3}-\d{4}$/',
            'address'   => 'required',
            'logo'      => 'required|image|max:12288'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
