<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_bendungan',7);
            $table->string('lokasi', 20);
            $table->text('keterangan');
            $table->string('longtitude', 20);
            $table->string('latitude', 20);
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
        Schema::dropIfExists('tb_dam');
    }
}
