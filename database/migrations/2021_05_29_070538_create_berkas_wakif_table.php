<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasWakifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_wakif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_wakif')->constrained('wakif');
            $table->string('sertifikat_tanah', 50);
            $table->string('sktts', 50);
            $table->string('sppt', 50);

            $table->string('status_hak_nomor', 50);
            $table->string('atas_hak_nomor', 50);
            $table->string('atas_hak_lain', 50)->nullable();
            $table->string('luas', 50);
            $table->string('batas_timur', 50);
            $table->string('batas_barat', 50);
            $table->string('batas_utara', 50);
            $table->string('batas_selatan', 50);
            $table->char('id_desa', 10);
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->string('kecamatan', 15)->default('Pulosari');
            $table->string('kabupaten', 15)->default('Kab. Pemalang');
            $table->string('provinsi', 15)->default('Jawa Tengah');
            $table->string('keperluan', 100);
            $table->string('nama_pewasiat', 40)->nullable();
            $table->year('tahun_diwakafkan', 4)->nullable();
            $table->foreignId('id_status')->default(1)->constrained('status');
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
        Schema::dropIfExists('wakif');
    }
}
