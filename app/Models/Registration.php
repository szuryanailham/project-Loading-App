<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
  protected $guarded = ['id'];

    /**
     * Relasi: Registrasi bisa mengikuti banyak event
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_registration')
            ->withTimestamps();
    }
}
