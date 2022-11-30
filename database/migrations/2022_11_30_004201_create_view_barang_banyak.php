<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
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
    DB::unprepared(
      "CREATE OR REPLACE VIEW barang_banyak AS (
        SELECT
        barang.nama_barang, barang.jml_barang,
        barang_masuk.tgl_masuk,
        detail_barang.spesifikasi
        FROM barang
        JOIN detail_barang
            ON barang.id_barang = detail_barang.kode_barang
        JOIN barang_masuk
            ON barang_masuk.id_barang_masuk = detail_barang.kode_barang
      )"
    );
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_barang_banyak');
    }
};
