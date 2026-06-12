<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable =
    ['name','contact_person','phone','email','address','status'];

    public function ingredient() : HasMany{
        return $this -> hasMany(Ingredient::class);
    }

    public function purchase() : HasMany{
        return $this -> hasMany(Purchase::class);
    }
}
