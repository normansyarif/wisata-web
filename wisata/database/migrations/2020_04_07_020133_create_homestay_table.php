<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomestayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homestay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('foto');
            $table->integer('kamar_tersedia');
            $table->mediumText('fasilitas');
            $table->string('kisaran_harga');
            $table->mediumText('alamat');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
        Schema::dropIfExists('homestay');
    }
}
