<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:50',
            'description'=> 'required|string|min:3|max:255',
            'stock_quantity'=> 'required|numeric|min:0',
            'minimum_stock'=> 'required|numeric|min:0',
            'last_purchase_date'=> 'required|date',
            'unit_cost'=> 'required|numeric|min:0.01',
            'status' => 'required|in:active,inactive',

            'supplier_id'=> 'nullable|exists:suppliers,id',
            'unit_measure_id'=> 'nullable|exists:unit_measures,id',
        ];
    }
}
