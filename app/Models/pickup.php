<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pickup extends Model
{
    use HasFactory;
    protected $table = 'pickups';
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }
}
