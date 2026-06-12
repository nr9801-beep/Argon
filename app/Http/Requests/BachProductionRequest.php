<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BachProductionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'production_date' => 'required|date',
            'quantity_produced' => 'required|integer|min:1',
            'production_cost'=> 'required|numeric|min:0',
            'observations'=> 'nullable|string',

            'product_id'=> 'nullable|exists:products,id',
            'employee_id'=> 'nullable|exists:employees,id',
        ];
    }
}
