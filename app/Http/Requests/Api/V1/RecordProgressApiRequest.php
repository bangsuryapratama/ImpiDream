<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class RecordProgressApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'wallet_id' => ['nullable', 'exists:wallets,id'],
            'amount' => ['required', 'numeric', 'min:1000'],
            'note' => ['nullable', 'string', 'max:255'],
        ];
    }
}
