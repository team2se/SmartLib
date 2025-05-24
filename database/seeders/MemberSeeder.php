<?php

namespace Database\Seeders; // <--- TAMBAHKAN BARIS INI

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'name' => 'Budi Perkasa',
                'email' => 'budi.perkasa@example.com',
                'phone_number' => '081234567890',
                'address' => 'Jl. Pahlawan No. 1, Jakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti.aminah@example.com',
                'phone_number' => '087712345678',
                'address' => 'Jl. Merdeka No. 10, Bandung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Rahmat Hidayat',
                'email' => 'rahmat.h@example.com',
                'phone_number' => null,
                'address' => 'Jl. Kemerdekaan No. 25, Surabaya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}