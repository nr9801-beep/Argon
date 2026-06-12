<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitMeasure extends Model
{
    protected $fillable = ['name','abbrevistion','description'];

    public function product() : HasMany{
        return $this -> hasMany(Product::class);
    }

    public function ingredient() : HasMany{
        return $this -> hasMany(Ingredient::class);
    }
}
