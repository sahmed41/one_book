<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Book::factory(15)->create();
        // \App\Models\Member::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'James',
            'email' => 'james@email.com',
            'password' => 'james1234',
        ]);

        User::create([
            'name' => 'Abraham',
            'email' => 'ab@email.com',
            'password' => 'abraham1234',
        ]);
    }
}
