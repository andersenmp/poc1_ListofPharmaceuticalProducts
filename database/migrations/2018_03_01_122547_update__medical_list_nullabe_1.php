<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMedicalListNullabe1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('medical_lists', function (Blueprint $table) {
        $table->string('name',100)->nullabe()->change();
        $table->string('composition',250)->nullabe()->change();
        $table->string('reimbursible',100)->nullabe()->change();
        $table->string('usage',250)->nullabe()->change();
        $table->string('comments',250)->nullabe()->change();
        $table->string('link',250)->nullabe()->change();
        $table->integer('requested_by')->unsigned()->nullabe()->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('medical_lists', function (Blueprint $table) {
        $table->string('name',100)->change();
        $table->string('composition',250)->change();
        $table->string('reimbursible',100)->change();
        $table->string('usage',250)->change();
        $table->string('comments',250)->change();
        $table->string('link',250)->change();
        $table->integer('requested_by')->unsigned()->change();
      });
    }
}
