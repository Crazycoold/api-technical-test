<?php

namespace App\Models\bookings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = "events";

    public function place()
    {
        return $this->belongsTo(places::class, 'id_places');
    }
}
