<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model
{
    use HasFactory; 
 protected $fillable = [
        'name',
        'slug',
        'poster_img',
        'description',
        'date',
        'event_type',
        'location',
        'price_type',
        'price',
        'registration_status',
        'external_link',
    ];

    // Relasi many-to-many dengan Registration
  public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

      public function getRouteKeyName(){
        return 'slug';
    }
}
