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
        Schema::create('perawatan', function (Blueprint $table) {
            $table->string('id_perawatan')->primary();
            $table->integer('kode_barang');
            $table->string('nama_pelaksana');
            $table->string('jml_perawatan');
            $table->text('ket_perawatan');
            $table->string('foto_perawatan');
            $table->datetime('tgl_perawatan');

            // Foreign key untuk kode_barang
            $table
            ->foreign('kode_barang')
            ->references('kode_barang')
            ->on('detail_barang')
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
        Schema::dropIfExists('perawatan');
    }
};
