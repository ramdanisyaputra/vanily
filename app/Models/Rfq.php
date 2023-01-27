<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfq extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rfqDetail()
    {
        return $this->hasMany(RfqDetail::class);
    }

    public function qt()
    {
        return $this->hasOne(Qt::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
