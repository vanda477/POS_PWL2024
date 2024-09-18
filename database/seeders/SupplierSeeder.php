<?php

namespace Database\Seeders;

use App\Models\m_supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1,
                'supplier_kode' => 'SP001',
                'supplier_nama' => 'PT Elektronik Rumah Sejahtera',
                'supplier_alamat' => 'Jakarta, Indonesia',
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'SP002',
                'supplier_nama' => 'CV Peralatan Kantor Maju',
                'supplier_alamat' => 'Bandung, Indonesia',
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'SP003',
                'supplier_nama' => 'PT Mainan Anak Ceria',
                'supplier_alamat' => 'Surabaya, Indonesia',
            ],
            [
                'supplier_id' => 4,
                'supplier_kode' => 'SP004',
                'supplier_nama' => 'PT Fashion Wanita Modern',
                'supplier_alamat' => 'Semarang, Indonesia',
            ],
            [
                'supplier_id' => 5,
                'supplier_kode' => 'SP005',
                'supplier_nama' => 'CV Produk Kesehatan Prima',
                'supplier_alamat' => 'Medan, Indonesia',
            ],
        ];

        DB::table('m_supplier')->insert($data);
    }
}