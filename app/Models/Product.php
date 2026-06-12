<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name','type_product','description',
    'selling_price','status','unit_measure_id','recipe_id'];

    public function bachproduction() : HasMany{
        return $this -> hasMany(BachProduction::class);
    }

    public function recipe() : BelongsTo{
        return $this -> belongsTo(Recipe::class);
    }

    public function unitmeasure() : BelongsTo{
        return $this -> belongsTo(UnitMeasure::class);
    }
}
