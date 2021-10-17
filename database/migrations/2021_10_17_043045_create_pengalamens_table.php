<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalamens', function (Blueprint $table) {
            $table->id('id_pengalamen');
            $table->string('pengalamen_kerja');
            $table->string('tahun_pengalamen')->nullable();
            $table->string('deskripsi_pengalamen')->nullable();
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
        Schema::dropIfExists('pengalamens');
    }
}
