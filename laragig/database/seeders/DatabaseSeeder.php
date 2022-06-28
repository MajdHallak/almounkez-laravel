<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Listing::factory(4)->create();

    // Listing::create([
    //  'title' => 'Laravel Senior Developer',
    //  'tags' => 'laravel, javascript',
    //  'company' => 'Acme Corp',
    //  'location' => 'Boston, MA',
    //  'email' => 'email1@email.com',
    //  'website' => 'https://www.acme.com',
    //  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    // ]);

    // \App\Models\User::factory()->create([
    //  'name' => 'Test User',
    //  'email' => 'test@example.com',
    // ]);
    }
}
