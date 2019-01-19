<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePulsaDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulsa_datas', function (Blueprint $table) {
            $table->increments('id_pulsa');
            $table->string('jumlah_pulsa');
            $table->string('masa_aktif');
            $table->integer('harga_pulsa');
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
        Schema::dropIfExists('pulsa_datas');
    }
}
