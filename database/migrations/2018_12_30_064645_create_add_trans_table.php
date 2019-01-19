<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            //
            $table->string('nama_user');
            $table->string('jumlah_pulsa');
            $table->string('harga_pulsa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            //
            $table->dropColumn('nama_user');
            $table->dropColumn('jumlah_pulsa');
            $table->dropColumn('harga_pulsa');
        });
    }
}
