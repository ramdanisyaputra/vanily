<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qt extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function qtDetail()
    {
        return $this->hasMany(qtDetail::class);
    }

    public function rfq()
    {
        return $this->belongsTo(Rfq::class);
    }

}
