<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Viyendra',
            'email' => 'muhammadviyendra@gmail.com', 
            'password' => Hash::make('viyen2005'), 
        ]);
    }
}