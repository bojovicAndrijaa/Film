<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategorija;
use \App\Models\User;
use App\Models\Reziser;
use App\Models\Film;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Kategorija::truncate();
        User::truncate();
        Reziser::truncate();
        Film::truncate();
        $this->call([
            KategorijaSeeder::class,

        ]);

        // User::factory(5)->create();
        
        // Author::factory(5)->create();        

        Film::factory(10)->create();
        

       
    }
}
