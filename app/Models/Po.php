<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function PoDetail()
    {
        return $this->hasMany(PoDetail::class);
    }

    public function qt()
    {
        return $this->belongsTo(Qt::class);
    }

}
