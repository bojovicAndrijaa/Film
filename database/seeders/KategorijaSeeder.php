<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategorija;

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategorija::create([
            'name'=>'Action and Adventure'
        ]);
        Kategorija::create([
            'name'=>'Classic'
        ]);
        Kategorija::create([
            'name'=>'Drama'
        ]);
        Kategorija::create([
            'name'=>'Comedy'
        ]);
        Kategorija::create([
            'name'=>'Detective and Mystery'
        ]);
        Kategorija::create([
            'name'=>'Fantasy'
        ]);
        Kategorija::create([
            'name'=>'Historical Fiction'
        ]);
        Kategorija::create([
            'name'=>'Horror'
        ]);
        Kategorija::create([
            'name'=>'Romance'
        ]);
    }
}
