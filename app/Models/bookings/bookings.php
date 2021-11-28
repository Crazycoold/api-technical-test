<?php

namespace App\Models\bookings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = "bookings";
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];

    public function events()
    {
        return $this->belongsTo(events::class, 'id_events');
    }
}
