<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->integer('no_urut')->default(0);
            $table->date('tanggal_surat');
            $table->text('keterangan');
            $table->string('tujuan',100);
            $table->string('jenis_surat',100);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });

        DB::table('nomor')->insert([
            'kode' => '00000',
            'no_urut' => '0',
            'tanggal_surat' => Carbon::now(),
            'keterangan' => '0',
            'tujuan' => '0',
            'jenis_surat' => '0',
            'user_id' => 1
        ]);
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
