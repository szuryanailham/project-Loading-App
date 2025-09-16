<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 10 event dummy
        Event::factory()->count(10)->create();
    }
}
