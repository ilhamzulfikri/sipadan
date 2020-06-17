<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tagihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_tagihan');
            $table->date('tgl_tagihan');
            $table->decimal('nilai_tagihan',19,0);
            $table->string('ket_tagihan');
            $table->integer('notadinas_id');
            $table->integer('hpe_id');
            $table->integer('proses_pengadaan_id');
            $table->integer('kontrak_id');
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
