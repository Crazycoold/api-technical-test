<?php

namespace App\Models\bookings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyers extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = "buyers";
}
