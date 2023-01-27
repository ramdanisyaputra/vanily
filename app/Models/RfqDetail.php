<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfqDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rfq()
    {
        return $this->belongsTo(Rfq::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
