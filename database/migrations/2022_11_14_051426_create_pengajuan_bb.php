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
        Schema::create('pengajuan_bb', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->string('id_pengajuan_bb')->primary();
            $table->char('manajemen', 18);
            $table->integer('kaprog');
            $table->char('nama_barang');
            $table->string('spesifkasi');
            $table->string('harga_satuan');
            $table->string('total_harga');
            $table->string('jumlah');
            $table->datetime('tgl');
            $table->string('ruangan');

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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_bb');
    }
};
