<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
        //This is the Ninjas Dojo and Ninjas database calls
        $this-> call([
            DojoSeeder::class,
        ]);
        $this-> call([
            NinjaSeeder::class,
        ]);

        //Our product call for Products and Categories calls
        $this-> call([
            CategorieSeeder::class,  
        ]);
        
        $this-> call([
            ProductSeeder::class,
        ]);
    }
}
