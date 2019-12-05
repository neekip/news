<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('example');
            $table->timestamp('remember_token');
            $table->tinyInteger('userid');
            $table->smallInteger('sthid');
            $table->string('name',50)->nullable(true)->comment('this is the name');

            $table->timestamp('token_verified_at')->nullable(true);
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
        Schema::dropIfExists('example');
    }
}

