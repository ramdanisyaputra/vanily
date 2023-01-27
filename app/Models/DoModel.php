<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoModel extends Model
{
    use HasFactory;
    protected $table = 'dos';
    protected $guarded = [];

    public function DoDetail()
    {
        return $this->hasMany(DoDetail::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

}
