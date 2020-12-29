<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_group', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('code_group', 7);
            $table->string('Desa', 15);
            $table->string('Nama_kelompok', 25);
            $table->text('alamat');
            $table->integer('tahun_berdiri');
            $table->integer('total_anggota');
            $table->string('komoditas_unggulan', 15);
            $table->string('ketua', 30);
            $table->string('sekretaris', 30);
            $table->string('bendahara', 30);
            $table->string('nama_penyuluh', 30);
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
        Schema::dropIfExists('farmer_group');
    }
}
