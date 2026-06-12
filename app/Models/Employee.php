<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    protected $fillable = ['frist_name','last_name','phone','email',
    'position','hire_date','carnet','status'];

    public function purchase() : HasMany{
        return $this->hasMany(Purchase::class);
    }
    public function invetarymovement() : HasMany{
        return $this->hasMany(InventaryMovement::class);
    }
    public function bachproduction() : HasMany{
        return $this->hasMany(BachProduction::class);
    }

    public function user() : HasOne{
        return $this->hasOne(User::class);
    }
}
