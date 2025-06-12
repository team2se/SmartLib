<?php

namespace Database\Seeders;

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
            // --- Data Asli Anda ---
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

            // --- Data Tambahan ---
            [
                'title' => 'The Art of Clean Code',
                'author' => 'Robert Martin',
                'isbn' => '978-0132350884',
                'published_year' => 2021,
                'stock' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'isbn' => '978-0735211292',
                'published_year' => 2018,
                'stock' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sapiens: Riwayat Singkat Umat Manusia',
                'author' => 'Yuval Noah Harari',
                'isbn' => '978-6020384280',
                'published_year' => 2017,
                'stock' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Introduction to Algorithms',
                'author' => 'Thomas H. Cormen',
                'isbn' => '978-0262033848',
                'published_year' => 2009,
                'stock' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'isbn' => '978-9793062792',
                'published_year' => 2005,
                'stock' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'isbn' => '978-9799731234',
                'published_year' => 1980,
                'stock' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'David Thomas, Andrew Hunt',
                'isbn' => '978-0201616224',
                'published_year' => 1999,
                'stock' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}