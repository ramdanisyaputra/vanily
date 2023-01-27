<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function InvDetail()
    {
        return $this->hasMany(InvDetail::class);
    }

    public function po()
    {
        return $this->belongsTo(Po::class);
    }

}
