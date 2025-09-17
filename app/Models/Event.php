<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model
{
    use HasFactory; 
 protected $fillable = [
        'name', 
        'poster_img',
        'description', 
        'date', 
        'event_type',   
        'location', 
        'price_type',  
        'price', 
        'external_link'
    ];

    // Relasi many-to-many dengan Registration
  public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
