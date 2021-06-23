<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kamar', 100);
            $table->bigInteger('pengurus_id')->unsigned();
            $table->char('jml_lemari', 3);
            // $table->char('no_lemari', 3);
            $table->timestamps();
        });
        Schema::table('kamar', function (Blueprint $table) {
            $table->foreign('pengurus_id')->references('id')->on('pengurus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}
