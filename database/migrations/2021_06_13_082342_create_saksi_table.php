<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 40);
            $table->char('nik', 16);
            $table->string('tempat_lahir', 35);
            $table->date('tanggal_lahir');
            $table->char('id_agama', 1)->default(1);
            $table->char('id_pendidikan_terakhir', 2);
            $table->string('pekerjaan', 50);
            $table->string('kewarganegaraan')->default('Indonesia');
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->char('id_desa', 10);
            $table->string('kecamatan', 15)->default('Pulosari');
            $table->string('kabupaten', 15)->default('Kab. Pemalang');
            $table->string('provinsi', 15)->default('Jawa Tengah');
            $table->string('ktp', 50);
            $table->timestamps();

            $table->foreign('id_agama')->references('id')->on('agama');
            $table->foreign('id_pendidikan_terakhir')->references('id')->on('pendidikan_terakhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saksi');
    }
}
