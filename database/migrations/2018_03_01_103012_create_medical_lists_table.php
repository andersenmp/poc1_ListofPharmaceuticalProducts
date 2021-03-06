<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_lists', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',100)->nullable(TRUE);
          $table->string('composition',250)->nullable(TRUE);
          $table->string('reimbursible',100)->nullable(TRUE);
          $table->string('usage',250)->nullable(TRUE);
          $table->string('comments',250)->nullable(TRUE);
          $table->string('link',250)->nullable(TRUE);
          $table->timestamps();
          $table->integer('requested_by')->unsigned()->nullabe(TRUE);
          $table->foreign('requested_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_lists');
    }
}
