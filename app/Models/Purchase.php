<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
    protected $fillable = ['purchese_date','total_amount','invoice_number',
    'status','supplier_id','employee_id'];

    public function purchasedetail() : HasMany{
        return $this->hasMany(PurchaseDetails::class);
    }

    public function supplier() : BelongsTo{
        return $this->belongsTo(Supplier::class);
    }

    public function employee() : BelongsTo{
        return $this->belongsTo(Employee::class);
    }
}
