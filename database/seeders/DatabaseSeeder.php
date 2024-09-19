<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (Storage::disk('public')->exists('categories')) {
            Storage::disk('public')->deleteDirectory('categories');
            $this->command->info('Folder deleted: categories');
        } else {
            $this->command->info('Folder not found: categories');
        }

        // Admin User
        User::firstOrCreate([
            'name' => 'Ahmed Wassim',
            'email' => 'ahmedwassim317@gmail.com',
            'phone' => '01029287271',
            'password' => bcrypt('123456789'),
            'status' => 1,
        ]);

        $this->call([
            CategorySeeder::class,
        ]);
    }
}