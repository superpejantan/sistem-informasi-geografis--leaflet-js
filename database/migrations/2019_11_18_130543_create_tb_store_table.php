<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_store', 7);
            $table->string('nama', 20);
            $table->text('alamat');
            $table->string('longtitude', 15);
            $table->string('latitude', 15);
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
        Schema::dropIfExists('tb_store');
    }
}
