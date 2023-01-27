<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function JurnalDetail()
    {
        return $this->hasMany(JurnalDetail::class);
    }

    public function do()
    {
        return $this->belongsTo(DoModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

}
