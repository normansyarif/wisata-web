<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelompokSeniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_seni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('foto');
            $table->string('alamat');
            $table->string('lat')->nullable();;
            $table->string('lng')->nullable();;
            $table->mediumText('deskripsi');
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->bigInteger('id_pemilik');
            $table->bigInteger('id_wilayah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelompok_seni');
    }
}
