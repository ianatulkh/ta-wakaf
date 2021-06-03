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
            $table->string('sertifikat_tanah', 40);
            $table->string('surat_ukur', 40);
            $table->string('sktts', 40);
            $table->string('sppt', 40);
            $table->foreignId('id_status')->constrained('status');
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
        Schema::dropIfExists('wakif');
    }
}
