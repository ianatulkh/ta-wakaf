<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasWakifSaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_wakif_saksi', function (Blueprint $table) {
            $table->foreignId('id_berkas_wakif')->constrained('berkas_wakif');
            $table->foreignId('id_saksi')->constrained('saksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_wakif_saksi');
    }
}
