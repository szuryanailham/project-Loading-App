<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'name',
        'email',
        'event_id',
        'rating', 
        'comment',
    ];

     public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
