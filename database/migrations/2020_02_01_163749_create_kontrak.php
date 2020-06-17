<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontrak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         //
        Schema::create('kontrak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kontrak');
            $table->date('tgl_mulai_kontrak');
            $table->date('tgl_akhir_kontrak');
            $table->decimal('nilai_kontrak',19,0);
            $table->string('vendor_pemenang');
            $table->string('upload_cover');
            $table->string('upload_surat');
            $table->string('upload_lampiran');
            $table->string('upload_proses');
            $table->string('upload_penawaran');
            $table->string('upload_pakta');
            $table->integer('notadinas_id');
            $table->integer('hpe_id');
            $table->integer('proses_pengadaan_id');
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
        //
    }
}
