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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->string('id_barang_masuk')->primary();
            $table->integer('kode_barang');
            $table->string('supplier');
            $table->integer('manajemen');
            $table->datetime('tgl_masuk');

            // Foreign key untuk kode__barang
            $table
            ->foreign('kode_barang')
            ->references('kode_barang')
            ->on('detail_barang')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            // Foreign key untuk supplier
            $table
            ->foreign('supplier')
            ->references('id_supplier')
            ->on('supplier')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            // Foreign key untuk manajemen
            $table
            ->foreign('manajemen')
            ->references('nip')
            ->on('manajemen')
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
        Schema::dropIfExists('barang_masuk');
    }
};
