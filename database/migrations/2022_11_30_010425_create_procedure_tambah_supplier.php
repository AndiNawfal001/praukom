<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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

        DB::unprepared("DROP PROCEDURE IF EXISTS tambah_supplier");
        DB::unprepared(
          "CREATE PROCEDURE tambah_supplier(
                nama VARCHAR(255),
                kontak VARCHAR(255),
                alamat VARCHAR(255)
            )
            BEGIN
            DECLARE kode_lama CHAR(6);
            DECLARE kode_baru CHAR(6);
            DECLARE ambil_angka INT;
            DECLARE angka_baru CHAR(3);

            SELECT MAX(id_supplier) INTO kode_lama FROM supplier;

            SET ambil_angka = SUBSTR(kode_lama, 4, 3) + 1;
            SET angka_baru = LPAD(ambil_angka,3, 0);
            SET kode_lama = SUBSTR(kode_lama, 1, 3);
            SET kode_baru = CONCAT(kode_lama, angka_baru);

            INSERT INTO supplier
            (id_supplier, nama, kontak, alamat)
            VALUES(
                kode_baru, nama, kontak, alamat
            );

          END;"
        );
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure_tambah_supplier');
    }
};
