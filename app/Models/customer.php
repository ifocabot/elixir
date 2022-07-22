<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = ['nama_customer','alamat_customer','area_id'];

    public function pickup()
    {
        return $this->hasOne(pickup::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

}


