<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\Participant::factory(10)->create();

        \App\Models\Participant::create([
            'username' => 'user1',
            'email_address' => 'user1@example.com',
            'password' => 'password'
        ]);

        \App\Models\Participant::create([
            'username' => 'user2',
            'email_address' => 'user2@example.com',
            'password' => 'password'
        ]);

        \App\Models\Participant::create([
            'username' => 'user3',
            'email_address' => 'user3@example.com',
            'password' => 'password'
        ]);

        \App\Models\BlogPost::create([
            'participant_id' => 1,
            'content' => 'Content1'
        ]);

        \App\Models\BlogPost::create([
            'participant_id' => 2,
            'content' => 'Content2'
        ]);

        \App\Models\BlogPost::create([
            'participant_id' => 3,
            'content' => 'Content3'
        ]);

    }
}
