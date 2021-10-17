<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id('id_pendidikans');
            $table->string('nama_kuliah');
            $table->string('tahun_kuliah')->nullable();
            $table->string('deskripsi_kuliah')->nullable();
            $table->string('nama_sma')->nullable();
            $table->string('tahun_sma')->nullable();
            $table->string('deskripsi_sma')->nullable();
            $table->string('nama_smp')->nullable();
            $table->string('tahun_smp')->nullable();
            $table->string('deskripsi_smp')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_pendidikans');
    }
}
