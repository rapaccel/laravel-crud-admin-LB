<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\about;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        about::create([
            'tentang'=>'isi tentang..',
            'nohp'=>'0898',
            'email'=>'liburngoding@gmail.com',
            'alamat'=>'@liburngoding',
            'ig'=>'@liburngoding'
        ]);
    }
}
