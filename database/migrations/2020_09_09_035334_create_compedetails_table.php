<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compe_details', function (Blueprint $table) {
            $table->increments('compe_id');
            $table->integer('group_id'); //グループID
            $table->timestamps();
            $table->string('compe_name'); //コンペの名前
            $table->date('compe_date'); //コンペの開催日
            $table->string('compe_course'); //コンペのコース
            $table->string('compe_comment')->nullable(); //コンペのコメント
            $table->integer('delete_flag'); //コンペのコメント
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compe_details');
    }
}
