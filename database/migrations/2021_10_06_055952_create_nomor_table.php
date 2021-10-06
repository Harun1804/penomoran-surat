<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomor', function (Blueprint $table) {
            $table->id();
            $table->string('kode',10);
            $table->integer('no_urut');
            $table->date('tanggal_surat');
            $table->text('keterangan');
            $table->string('tujuan',100);
            $table->string('jenis_surat',100);
            $table->foreignId('user_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('nomor');
    }
}
