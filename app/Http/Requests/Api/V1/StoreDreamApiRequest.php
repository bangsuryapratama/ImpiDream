<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDreamApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'target_amount' => ['required', 'numeric', 'min:10000'],
            'current_amount' => ['nullable', 'numeric', 'min:0'],
            'target_date' => ['required', 'date', 'after:today'],
            'category' => ['required', 'string', 'max:100'],
            'marketplace_product_id' => ['nullable', 'exists:marketplace_products,id'],
        ];
    }
}
