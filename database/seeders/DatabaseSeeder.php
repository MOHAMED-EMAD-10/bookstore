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

        $folders = ['categories', 'books'];

        foreach ($folders as $folder) {
            if (Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->deleteDirectory($folder);
                $this->command->info("Folder deleted: $folder");
            } else {
                $this->command->info("Folder not found: $folder");
            }
        }

        // Admin User
        User::firstOrCreate([
            'name' => 'Ahmed Wassim',
            'email' => 'ahmedwassim317@gmail.com',
            'phone' => '01029287271',
            'password' => bcrypt('123456789'),
            'status' => 1,
        ]);

        User::factory(9)->create();

        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
            BorrowingSeeder::class
        ]);
    }
}
