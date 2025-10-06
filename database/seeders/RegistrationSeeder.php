<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 20 data dummy registrasi
        Registration::factory()->count(30)->create();
    }
}
