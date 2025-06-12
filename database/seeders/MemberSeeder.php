<?php

namespace Database\Seeders;

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
            // --- Data Asli Anda (1-10) ---
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
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@example.com',
                'phone_number' => '085698765432',
                'address' => 'Jl. Gajah Mada No. 15, Semarang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Agus Santoso',
                'email' => 'agus.santoso@example.com',
                'phone_number' => '081122334455',
                'address' => 'Jl. Diponegoro No. 88, Yogyakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Eka Wijaya',
                'email' => 'eka.wijaya@example.com',
                'phone_number' => null,
                'address' => 'Jl. Sudirman No. 45, Medan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Putri Ayu',
                'email' => 'putri.a@example.com',
                'phone_number' => '089988776655',
                'address' => 'Jl. Hasanuddin No. 3, Makassar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'a.fauzi@example.com',
                'phone_number' => '082134567890',
                'address' => 'Jl. Patimura No. 12, Palembang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Faisal Tanjung',
                'email' => 'faisal.t@example.com',
                'phone_number' => '081312345678',
                'address' => 'Jl. Sisingamangaraja No. 7, Pekanbaru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Indah Permata',
                'email' => 'indah.p@example.com',
                'phone_number' => '081987654321',
                'address' => 'Jl. Kartini No. 99, Denpasar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // --- Tambahan hingga 15 ---
            [
                'name' => 'Rina Wati',
                'email' => 'rina.wati@example.com',
                'phone_number' => '081712348765',
                'address' => 'Jl. Ahmad Yani No. 50, Balikpapan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Joko Susilo',
                'email' => 'joko.s@example.com',
                'phone_number' => '085233445566',
                'address' => 'Jl. Veteran No. 22, Malang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lia Kurnia',
                'email' => 'lia.kurnia@example.com',
                'phone_number' => '087856781234',
                'address' => 'Jl. Pangeran Antasari No. 18, Banjarmasin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Heru Prasetyo',
                'email' => 'heru.p@example.com',
                'phone_number' => null,
                'address' => 'Jl. Gatot Subroto No. 3, Manado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya.sari@example.com',
                'phone_number' => '081298765432',
                'address' => 'Jl. Teuku Umar No. 101, Pontianak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}