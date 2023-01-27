<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QtDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function qt()
    {
        return $this->belongsTo(Qt::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
