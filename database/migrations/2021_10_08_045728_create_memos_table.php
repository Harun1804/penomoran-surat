<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('kode',10);
            $table->integer('no_urut')->default(0);
            $table->date('tanggal_memo');
            $table->text('keterangan');
            $table->string('tujuan',100);
            $table->string('jenis_memo',100);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });

        DB::table('memos')->insert([
            'kode' => '00000',
            'no_urut' => '0',
            'tanggal_memo' => Carbon::now(),
            'keterangan' => '0',
            'tujuan' => '0',
            'jenis_memo' => '0',
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
        Schema::dropIfExists('memos');
    }
}
