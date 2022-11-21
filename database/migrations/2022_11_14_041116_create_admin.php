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
        Schema::create('admin', function (Blueprint $table) {
            $table->string('id_admin')->primary();
            $table->integer('id_pengguna');
            $table->string('nama');
            $table->string('kontak');

             // Foreign key untuk id_pengguna
            $table
            ->foreign('id_pengguna')
            ->references('id_pengguna')
            ->on('pengguna')
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
        Schema::dropIfExists('admin');
    }
};
