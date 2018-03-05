<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login',100)->nullabe(true);
            $table->string('first_name',100)->nullabe(true);
            $table->string('last_name',100)->nullabe(true);
            $table->string('feature',100);
            $table->string('email',100)->nullabe(true);
            $table->string('access_mode',100)->nullabe(true);
            $table->integer('org_id')->unsigned()->nullabe(true);
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
        Schema::dropIfExists('sentries');
    }
}
