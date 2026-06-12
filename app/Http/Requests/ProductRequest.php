<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:100',
            'type_product'=> 'required|string|max:50',
            'description'=> 'nullable|string|max:255',
            'selling_price'=> 'required|numeric|min:0.01',
            'status' => 'required|in:active,inactive',

            'unit_measure_id'=> 'nullable|exists:unit_measures,id',
            'recipe_id'=> 'nullable|exists:recipes,id',
        ];
    }
}
