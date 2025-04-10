<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        Movie::insert([
            [
                'movie_title' => 'Avengers: Endgame',
                'duration' => 181,
                'release_date' => '2019-04-26 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'Inception',
                'duration' => 148,
                'release_date' => '2010-07-16 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'The Dark Knight',
                'duration' => 152,
                'release_date' => '2008-07-18 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'Interstellar',
                'duration' => 169,
                'release_date' => '2014-11-07 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'The Matrix',
                'duration' => 136,
                'release_date' => '1999-03-31 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_title' => 'Titanic',
                'duration' => 195,
                'release_date' => '1997-12-19 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
