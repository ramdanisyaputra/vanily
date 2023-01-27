<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function po()
    {
        return $this->belongsTo(Po::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
