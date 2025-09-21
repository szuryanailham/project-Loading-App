<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Registration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class); 
    }



    protected static function booted()
    {
        static::deleting(function ($registration) {
            if ($registration->image_proof) {
                if (Storage::disk('public')->exists($registration->image_proof)) {
                    Storage::disk('public')->delete($registration->image_proof);
                }
            }
        });
    }
}

