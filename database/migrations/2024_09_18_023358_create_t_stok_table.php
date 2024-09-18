<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_stok', function (Blueprint $table) {
            $table->bigIncrements('stok_id'); // Menambahkan kolom stok_id
            $table->bigInteger('barang_id')->unsigned(); // Menambahkan kolom barang_id
            $table->bigInteger('user_id')->unsigned(); // Menambahkan kolom user_id
            $table->bigInteger('supplier_id')->unsigned();
            $table->dateTime('stok_tanggal'); // Menambahkan kolom stok_tanggal
            $table->integer('stok_jumlah'); // Menambahkan kolom stok_jumlah
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at

            $table->foreign('user_id')->references('user_id')->on('m_user');
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');
            $table->foreign('supplier_id')->references('supplier_id')->on('m_supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};