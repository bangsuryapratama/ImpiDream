<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDreamApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'target_amount' => ['sometimes', 'required', 'numeric', 'min:10000'],
            'current_amount' => ['nullable', 'numeric', 'min:0'],
            'target_date' => ['sometimes', 'required', 'date'],
            'category' => ['sometimes', 'required', 'string', 'max:100'],
            'status' => ['sometimes', 'required', 'in:active,completed,paused,cancelled'],
            'marketplace_product_id' => ['nullable', 'exists:marketplace_products,id'],
        ];
    }
}
