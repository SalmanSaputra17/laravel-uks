<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasien2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nis');
            $table->string('nama_pasien');
            $table->integer('rombel_id');
            $table->integer('rayon_id');
            $table->string('jenis_sakit');
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
        Schema::dropIfExists('pasien2');
    }
}
