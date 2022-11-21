<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_barang')->primary();
            $table->integer('kode_barang');
            $table->string('id_jenis_brg');
            $table->string('nama_barang');
            $table->string('jml_barang');

            // Foreign key untuk kode_barang
            $table
            ->foreign('kode_barang')
            ->references('kode_barang')
            ->on('detail_barang')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            // Foreign key untuk id_jenis_brg
            $table
            ->foreign('id_jenis_brg')
            ->references('id_jenis_brg')
            ->on('jenis_barang')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
