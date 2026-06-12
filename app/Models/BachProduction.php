<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BachProduction extends Model
{
    protected $fillable = ['production_date','quantity_produced','production_cost',
    'observations','product_id','employee_id'];

    public function products() : BelongsTo{
        return $this->belongsTo(Product::class);
    }
    public function employees() : BelongsTo{
        return $this->belongsTo(Employee::class);
    }
}
