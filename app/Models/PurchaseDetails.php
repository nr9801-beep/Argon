<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseDetails extends Model
{
    protected $fillable = ['quantity','unit_price','subtotal',
    'purchase_id','ingredient_id'];

    public function purchase() : BelongsTo{
        return $this->belongsTo(Purchase::class);
    }

    public function ingredient() : BelongsTo{
        return $this->belongsTo(Ingredient::class);
    }
}
