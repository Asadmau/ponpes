<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Santri', function (Blueprint $table) {
            $table->id('id');
            $table->char('nis', 11);
            $table->string('nama_santri', 100);
            $table->string('tmp_lahir', 100);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->enum('jenjang', ['SD', 'SMP', 'SMK'])->default('SD');
            $table->text('alamat');
            $table->string('kamar', 50);
            $table->char('thn_akademik',15 );
            $table->string('nama_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->string('src_santri', 100);
            $table->string('src_wali', 100);
            $table->char('hp', 13);
            $table->char('wa', 13);
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
        Schema::dropIfExists('Santri');
    }
}
