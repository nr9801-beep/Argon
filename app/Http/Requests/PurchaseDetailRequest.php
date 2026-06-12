<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }


    public function rules(): array
    {
        return [
            'quantity' => 'required|numeric|min:0.01',
            'unit_price' => 'required|numeric|min:0.01',
            'subtotal'=> 'required|numeric|min:0.01',

            'purchase_id'=> 'nullable|exists:purchases,id',
            'ingredient_id'=> 'nullable|exists:ingredients,id',
        ];
    }
}
