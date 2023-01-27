<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function PaymentDetail()
    {
        return $this->hasMany(PaymentDetail::class);
    }

    public function inv()
    {
        return $this->belongsTo(Inv::class);
    }

}
