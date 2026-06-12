<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'purchase_date' => 'required|date',
            'total_amount'=> 'required|numeric|min:0',
            'invoice_number'=> 'nullable|string|max:50',
            'status'=> 'required|in:pending,completed,cancelled',

            'supplier_id'=> 'nullable|exists:suppliers,id',
            'employee_id'=> 'nullable|exists:employees,id',
        ];
    }
}
