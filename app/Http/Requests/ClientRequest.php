<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class ClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\d{3}-\d{3}-\d{4}$/',
            'address' => 'required',
            'logo' => [
                'required',
                File::types(['png', 'jpg', 'webp'])->min(1024)->max(12 * 1024)
            ]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
