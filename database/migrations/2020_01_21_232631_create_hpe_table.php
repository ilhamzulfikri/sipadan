<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHpeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hpe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nonotaman');
            $table->date('tglnotaman');
            $table->string('norks');
            $table->date('tglrks');
            $table->decimal('nilaihpe',19,0);
            $table->decimal('waktu',19,0);
            $table->string('metode');
            $table->string('vendor');
            $table->string('uploadhpe');
            $table->string('uploadrks');
            $table->integer('notadinas_id');
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
