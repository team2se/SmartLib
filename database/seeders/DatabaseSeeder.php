<?php

namespace Database\Seeders; // <--- TAMBAHKAN BARIS INI

use Illuminate\Database\Seeder;
// Jika MemberSeeder juga ada di namespace Database\Seeders,
// Anda tidak perlu 'use Database\Seeders\MemberSeeder;' secara eksplisit di sini.
// Namun, jika berbeda namespace, Anda perlu menambahkannya.

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BookSeeder::class,
            MemberSeeder::class, // Pastikan MemberSeeder.php juga memiliki namespace Database\Seeders;
        ]);

        // ... sisa kode Anda ...
    }
}