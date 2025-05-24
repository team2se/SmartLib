<?php

namespace Database\Seeders; // <--- TAMBAHKAN BARIS INI

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Belajar Laravel dari Awal',
                'author' => 'Alex Code',
                'isbn' => '978-1603094528',
                'published_year' => 2023,
                'stock' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Panduan Lengkap Database',
                'author' => 'Jane Data',
                'isbn' => '978-1603094535',
                'published_year' => 2022,
                'stock' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Mastering Web Development',
                'author' => 'John Web',
                'isbn' => '978-1603094542',
                'published_year' => 2024,
                'stock' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}