<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventaryMovement extends Model
{
    protected $fillables = ['movement_type','quantity','movement_date',
    'description','employee_id','ingredient_id'];

    public function emplyee() : BelongsTo{
        return $this -> belongsTo(Employee::class);
    }
    public function ingredient() : BelongsTo{
        return $this -> belongsTo(Ingredient::class);
    }
}
