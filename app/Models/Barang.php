<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sementara()
    {
        return $this->hasMany(Sementara::class);
    }

    public function rfqDetail()
    {
        return $this->hasMany(rfqDetail::class);
    }

    public function qtDetail()
    {
        return $this->hasMany(qtDetail::class);
    }

    public function poDetail()
    {
        return $this->hasMany(PoDetail::class);
    }
}
