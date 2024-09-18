<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Elektronik Rumah (kategori_id: 1)
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'BK001',
                'barang_nama' => 'TV LED 40 Inch',
                'harga_beli' => 3000000,
                'harga_jual' => 3500000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'BK002',
                'barang_nama' => 'Mesin Cuci Front Load',
                'harga_beli' => 4500000,
                'harga_jual' => 5000000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 1,
                'barang_kode' => 'BK003',
                'barang_nama' => 'Kulkas Dua Pintu',
                'harga_beli' => 5500000,
                'harga_jual' => 6000000,
            ],

            // Peralatan Kantor (kategori_id: 2)
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'BK004',
                'barang_nama' => 'Printer LaserJet',
                'harga_beli' => 2000000,
                'harga_jual' => 2500000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 2,
                'barang_kode' => 'BK005',
                'barang_nama' => 'Mesin Fotokopi Digital',
                'harga_beli' => 10000000,
                'harga_jual' => 12000000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => 'BK006',
                'barang_nama' => 'Kursi Ergonomis Kantor',
                'harga_beli' => 750000,
                'harga_jual' => 900000,
            ],

            // Mainan Anak (kategori_id: 3)
            [
                'barang_id' => 7,
                'kategori_id' => 3,
                'barang_kode' => 'BK007',
                'barang_nama' => 'Mobil Remote Control',
                'harga_beli' => 500000,
                'harga_jual' => 600000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'BK008',
                'barang_nama' => 'Lego Classic Set',
                'harga_beli' => 300000,
                'harga_jual' => 350000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 3,
                'barang_kode' => 'BK009',
                'barang_nama' => 'Boneka Barbie',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
            ],

            // Fashion Wanita (kategori_id: 4)
            [
                'barang_id' => 10,
                'kategori_id' => 4,
                'barang_kode' => 'BK010',
                'barang_nama' => 'Blouse Sutra Wanita',
                'harga_beli' => 400000,
                'harga_jual' => 500000,
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 4,
                'barang_kode' => 'BK011',
                'barang_nama' => 'Tas Kulit Branded',
                'harga_beli' => 1500000,
                'harga_jual' => 1800000,
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 4,
                'barang_kode' => 'BK012',
                'barang_nama' => 'Sepatu High Heels',
                'harga_beli' => 600000,
                'harga_jual' => 750000,
            ],

            // Produk Kesehatan (kategori_id: 5)
            [
                'barang_id' => 13,
                'kategori_id' => 5,
                'barang_kode' => 'BK013',
                'barang_nama' => 'Suplemen Vitamin C',
                'harga_beli' => 100000,
                'harga_jual' => 150000,
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 5,
                'barang_kode' => 'BK014',
                'barang_nama' => 'Termometer Digital',
                'harga_beli' => 80000,
                'harga_jual' => 120000,
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 5,
                'barang_kode' => 'BK015',
                'barang_nama' => 'Alat Tes Gula Darah',
                'harga_beli' => 300000,
                'harga_jual' => 350000,
            ],
        ];

        DB::table('m_barang')->insert($data);        
        //
    }
}