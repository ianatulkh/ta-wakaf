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
            $table->foreignId('id_berkas_wakif')->constrained('berkas_wakif');
            $table->string('nomor', 50);
            $table->enum('wakif_jabatan', ['Organisasi', 'Badan Hukum'])->nullable();
            $table->enum('wakif_bertindak', ['Perseorangan', 'Wakif Organisasi', 'Badan Hukum']);
            $table->enum('nadzir_jabatan', ['Organisasi', 'Badan Hukum'])->nullable();
            $table->enum('nadzir_bertindak', ['Perseorangan', 'Organisasi', 'Badan Hukum']);

            $table->string('status_hak_nomor', 100);
            $table->string('atas_hak_nomor', 100);
            $table->string('atas_hak_lain', 100);
            $table->string('luas', 100);
            $table->string('batas_timur', 100);
            $table->string('batas_barat', 100);
            $table->string('batas_utara', 100);
            $table->string('batas_selatan', 100);
            $table->char('id_desa', 10);
            $table->string('kecamatan')->default('Pulosari');
            $table->string('kabupaten')->default('Kab. Pemalang');
            $table->string('provinsi')->default('Jawa Tengah');
            $table->string('keperluan');
            $table->timestamps();

            $table->foreign('id_desa')->references('id')->on('desa');
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
