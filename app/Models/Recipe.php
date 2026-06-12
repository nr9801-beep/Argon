<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = ['name','description','preparation_time','status'];

    public function product() : HasMany{
        return $this->hasMany(Product::class);
    }

    public function recipeingredient() : HasMany{
        return $this->hasMany(RecipeIngredient::class);
    }
}
