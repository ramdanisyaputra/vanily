<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function do()
    {
        return $this->belongsTo(DoModel::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
