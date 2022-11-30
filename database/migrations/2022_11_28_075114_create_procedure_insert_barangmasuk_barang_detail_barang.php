<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
  {

    DB::unprepared("DROP PROCEDURE IF EXISTS tambah_barangmasuk");
    DB::unprepared(
      "CREATE PROCEDURE tambah_barangmasuk(
            nama_barang VARCHAR(20),
            jml_barang INT(11),
            spesifikasi TEXT,
            kondisi_barang VARCHAR(10),
            supplier VARCHAR(30),
            nama_manajemen VARCHAR(30),
            jenis_barang VARCHAR(255),
            foto_barang VARCHAR(30)
        )
        BEGIN
        DECLARE kode_barang INT(11);
        DECLARE id_supplier varchar(255);
        DECLARE nip CHAR(18);
        DECLARE id_jenis_brg CHAR(18);


        SELECT supplier.id_supplier INTO id_supplier FROM supplier WHERE supplier.id_supplier = supplier;
        SELECT manajemen.nip INTO nip FROM manajemen WHERE manajemen.nama = nama_manajemen;
        SELECT jenis_barang.id_jenis_brg INTO id_jenis_brg FROM jenis_barang WHERE jenis_barang.id_jenis_brg = jenis_barang;

        INSERT INTO detail_barang (spesifikasi, kondisi_barang, foto_barang)
        VALUES (spesifikasi, kondisi_barang, foto_barang);
        SELECT detail_barang.kode_barang INTO kode_barang FROM detail_barang WHERE detail_barang.foto_barang = foto_barang;

        INSERT INTO barang (kode_barang ,id_jenis_brg ,nama_barang, jml_barang)
        VALUES (kode_barang ,id_jenis_brg ,nama_barang, jml_barang);
        INSERT INTO barang_masuk (kode_barang, supplier, manajemen, tgl_masuk)
        VALUES (kode_barang, id_supplier, nip, NOW());

      END;"
    );
  }
};
