<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function inv()
    {
        return $this->belongsTo(Inv::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
