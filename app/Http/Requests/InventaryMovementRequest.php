<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventaryMovementRequest extends FormRequest
{

    public function authorize(): bool
    {
        return false;
    }


    public function rules(): array
    {
        return [
            'movement_type'=> 'required|in:entry,exit',
            'quantity'=> 'required|numeric|min:0.01',
            'movement_date'=> 'required|date',
            'description'=> 'nullable|string|max:255',

            'employee_id'=> 'nullable|exists:employees,id',
            'ingredient_id'=> 'nullable|exists:ingredients,id',
        ];
    }
}
