<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasWakifNadzirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_wakif_nadzir', function (Blueprint $table) {
            $table->foreignId('id_berkas_wakif')->constrained('berkas_wakif');
            $table->foreignId('id_nadzir')->constrained('nadzir');
            $table->string('jabatan', 40)->nullable();
            $table->string('nama_badan_hukum_organisasi', 50)->nullable();
            $table->string('no_akta_notaris', 50)->nullable();
            $table->string('sekretaris', 40)->nullable();
            $table->string('bendahara', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_wakif_nadzir');
    }
}
