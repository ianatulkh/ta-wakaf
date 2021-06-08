<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesStatusBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('des_status_berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_berkas_wakif')->constrained('berkas_wakif');
            $table->text('ket_review_data');
            $table->text('ket_survey');
            $table->text('ket_ikrar');
            $table->text('ket_akta_ikrar');
            $table->text('ket_ditolak');
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
        Schema::dropIfExists('des_status_berkas');
    }
}
