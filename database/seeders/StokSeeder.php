<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Elektronik Rumah (kategori_id: 1)
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 50,
                'user_id' => 1,
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 40,
                'user_id' => 1,
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 60,
                'user_id' => 1,
            ],

            // Peralatan Kantor (kategori_id: 2)
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'supplier_id' => 2,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 30,
                'user_id' => 2,
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'supplier_id' => 2,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 20,
                'user_id' => 2,
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6,
                'supplier_id' => 2,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 25,
                'user_id' => 2,
            ],

            // Mainan Anak (kategori_id: 3)
            [
                'stok_id' => 7,
                'barang_id' => 7,
                'supplier_id' => 3,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 15,
                'user_id' => 3,
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8,
                'supplier_id' => 3,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 35,
                'user_id' => 3,
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9,
                'supplier_id' => 3,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 45,
                'user_id' => 3,
            ],

            // Fashion Wanita (kategori_id: 4)
            [
                'stok_id' => 10,
                'barang_id' => 10,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 60,
                'user_id' => 1,
            ],
            [
                'stok_id' => 11,
                'barang_id' => 11,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 55,
                'user_id' => 1,
            ],
            [
                'stok_id' => 12,
                'barang_id' => 12,
                'supplier_id' => 2,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 70,
                'user_id' => 2,
            ],

            // Produk Kesehatan (kategori_id: 5)
            [
                'stok_id' => 13,
                'barang_id' => 13,
                'supplier_id' => 3,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 80,
                'user_id' => 3,
            ],
            [
                'stok_id' => 14,
                'barang_id' => 14,
                'supplier_id' => 3,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 45,
                'user_id' => 3,
            ],
            [
                'stok_id' => 15,
                'barang_id' => 15,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-11 07:00:00',
                'stok_jumlah' => 50,
                'user_id' => 1,
            ],
        ];
        
        DB::table('t_stok')->insert($data);           
    }
}