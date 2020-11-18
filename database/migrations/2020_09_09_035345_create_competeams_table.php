<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompeTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compe_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('compe_id'); //コンペID;
            $table->string('compe_member');  //コンペ参加者のユーザーID
            $table->integer('compe_handicap');  //ハンディキャップ数
            $table->integer('compe_team')->nullable();  //コンペの組
            // $table->time('conpe_start_time')->nullable();  //組のスタート時間
            // $table->time('conpe_start_course')->nullable();  //組のスタートINorOut
            $table->integer('in_score')->nullable();
            $table->integer('out_score')->nullable();
            $table->integer('gross_score')->nullable();
            $table->integer('net_score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compe_teams');
    }
}
