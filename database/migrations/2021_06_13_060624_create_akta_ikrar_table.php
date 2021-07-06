<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaIkrarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_ikrar', function (Blueprint $table) {
            $table->id();
            // Data untuk membuat akta
            $table->foreignId('id_berkas_wakif')->constrained('berkas_wakif');
            $table->string('nomor', 50);
            $table->string('nomor_wtk', 50);
            $table->string('wakif_jabatan', 100)->nullable();
            $table->string('wakif_bertindak', 100);
            $table->string('nadzir_jabatan', 100)->nullable();
            $table->string('nadzir_bertindak', 100);
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
        Schema::dropIfExists('akta_ikrar');
    }
}
