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
        Schema::create('pengajuan_pb', function (Blueprint $table) {
            $table->string('id_pengajuan_pb')->primary();
            $table->integer('manajemen');
            $table->integer('kaprog');
            $table->integer('kode_barang');
            $table->char('nama_barang');
            $table->string('spesifikasi');
            $table->string('ruangan');
            $table->datetime('tgl');

            // Foreign key untuk manajemen
            $table
            ->foreign('manajemen')
            ->references('nip')
            ->on('manajemen')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            // Foreign key untuk kaprog
            $table
            ->foreign('kaprog')
            ->references('nip')
            ->on('kaprog')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

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
        Schema::dropIfExists('pengajuan_pb');
    }
};
