<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbHarvestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_harvest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_comodity');
            $table->string('produk');
            $table->string('code_desa');
            $table->string('luas_tanam');
            $table->string('luas_panen');
            $table->string('produktivitas(kw/ha)');
            $table->string('produksi(ton)');
            $table->string('latitude');
            $table->string('longtitude');
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
        Schema::dropIfExists('tb_harvest');
    }
}
