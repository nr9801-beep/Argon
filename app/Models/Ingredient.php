<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    protected $fillable = ['name','description','stock_quantity',
    'minimum_stock','last_purchase_date','unit_cost',
    'status','supplier_id','unit_measure_id'];

    public function supplier() : BelongsTo{
        return $this->belongsTo(Supplier::class);
    }
    public function unitMeasure() : BelongsTo{
        return $this->belongsTo(UnitMeasure::class);
    }

    public function recipeingredient() : HasMany{
        return $this->hasMany(RecipeIngredient::class);
    }
    public function inventarymovement() : HasMany{
        return $this->hasMany(InventaryMovement::class);
    }
    public function purchasedetail() : HasMany{
        return $this->hasMany(PurchaseDetails::class);
    }
}
