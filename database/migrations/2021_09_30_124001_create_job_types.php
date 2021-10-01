<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_types', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name',50)->nullable()->index();
            $table->bigInteger('job_category_id')->nullable()->unsigned();
            $table->integer('sort_order')->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('created',50)->nullable();
            $table->string('modified',50)->nullable();
            $table->string('deleted',50)->nullable();

            $table->foreign('job_category_id')->references('id')->on('job_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_types');
    }
}
