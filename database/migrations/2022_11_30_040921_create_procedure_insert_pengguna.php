<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        DB::unprepared("DROP PROCEDURE IF EXISTS tambah_pengguna");
        DB::unprepared(
          "CREATE PROCEDURE tambah_pengguna(
                username VARCHAR(255),
                email VARCHAR(255),
                hashing_password VARCHAR(255),
                nama VARCHAR(50),
                kontak VARCHAR(20),
                levelUser VARCHAR(20)
            )
            BEGIN
            DECLARE id_pengguna INT(11);
            DECLARE level_User VARCHAR(20);

            SELECT level_user.id_level INTO level_User FROM level_user WHERE level_user.nama_level = levelUser;

            INSERT INTO pengguna 
            (id_level, username, email, password)
            VALUES (levelUser, username, email, hashing_password);

            SELECT pengguna.id_pengguna INTO id_pengguna FROM pengguna WHERE pengguna.username = username;

            INSERT INTO admin 
            (id_pengguna, nama, kontak)
            VALUES (id_pengguna, nama, kontak);

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
        Schema::dropIfExists('procedure_insert_pengguna');
    }
};
