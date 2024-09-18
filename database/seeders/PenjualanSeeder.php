<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 1, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Vanda',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => '2024-09-11 07:30:00',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 2, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Agung',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => '2024-09-11 08:00:00',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Kenshin',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => '2024-09-11 08:30:00',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 1, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Qodri',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => '2024-09-11 09:00:00',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 2, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Afifah',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => '2024-09-11 09:30:00',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Fifi',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => '2024-09-11 10:00:00',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 1, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Kevin',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => '2024-09-11 10:30:00',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 2, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Nala',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => '2024-09-11 11:00:00',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Dicky',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => '2024-09-11 11:30:00',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 1, // Sesuaikan dengan user_id yang ada
                'pembeli' => 'Firstya',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => '2024-09-11 12:00:00',
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}