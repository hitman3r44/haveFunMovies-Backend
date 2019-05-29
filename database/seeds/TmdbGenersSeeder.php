<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TmdbGenersSeeder extends Seeder
{

    public function run()
    {
        DB::table('tmdb_genres')->delete();
        DB::table('tmdb_genres')->insert($this->getGenreData());
    }

    private function getGenreData()
    {
        return [
            [
                'tmdb_genre_id' => 28,
                'name' => 'Action',
            ],

            [
                'tmdb_genre_id' => 12,
                'name' => 'Adventure',
            ],

            [
                'tmdb_genre_id' => 16,
                'name' => 'Animation',
            ],

            [
                'tmdb_genre_id' => 35,
                'name' => 'Comedy',
            ],

            [
                'tmdb_genre_id' => 80,
                'name' => 'Crime',
            ],

            [
                'tmdb_genre_id' => 99,
                'name' => 'Documentary',
            ],

            [
                'tmdb_genre_id' => 18,
                'name' => 'Drama',
            ],

            [
                'tmdb_genre_id' => 10751,
                'name' => 'Family',
            ],

            [
                'tmdb_genre_id' => 14,
                'name' => 'Fantasy',
            ],

            [
                'tmdb_genre_id' => 36,
                'name' => 'History',
            ],

            [
                'tmdb_genre_id' => 27,
                'name' => 'Horror',
            ],

            [
                'tmdb_genre_id' => 10402,
                'name' => 'Music',
            ],

            [
                'tmdb_genre_id' => 9648,
                'name' => 'Mystery',
            ],

            [
                'tmdb_genre_id' => 10749,
                'name' => 'Romance',
            ],

            [
                'tmdb_genre_id' => 878,
                'name' => 'Science Fiction',
            ],

            [
                'tmdb_genre_id' => 10770,
                'name' => 'TV Movie',
            ],

            [
                'tmdb_genre_id' => 53,
                'name' => 'Thriller',
            ],

            [
                'tmdb_genre_id' => 10752,
                'name' => 'War',
            ],

            [
                'tmdb_genre_id' => 37,
                'name' => 'Western',
            ],
        ];
    }
}
