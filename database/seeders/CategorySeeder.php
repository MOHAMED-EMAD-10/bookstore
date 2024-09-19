<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Story',
        ]);

        Category::create([
            'name' => 'Adventure',
        ]);

        Category::create([
            'name' => 'Poetry',
        ]);

        Category::create([
            'name' => 'Money',
        ]);

        Category::create([
            'name' => 'Fictional',
        ]);

        Category::create([
            'name' => 'Romance',
        ]);
    }
}
