<?php

namespace Database\Seeders;


use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'BMW E36 Tour',
        //     'tags' => 'Rock, Jazz',
        //     'artist' => 'Kolbe Alex',
        //     'date' => '23 January 2024',
        //     'time' => '06:00 p.m.',
        //     'organizer' => 'GoLive Asia',
        //     'location' => 'National Stadium Bukit Jalil',
        //     'email' => 'concerts@golive.com',
        //     'description' => 'Experience an unforgettable night of music with the legendary 
        //      Kolbe Alex, who makes his grand entrance in his stunning BMW E36, which is the
        //      inspiration for all of his music.',
        // ]);

    }
}
