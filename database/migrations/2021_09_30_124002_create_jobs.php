<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name',50)->nullable()->index();
            $table->bigInteger('job_category_id')->nullable()->unsigned();
            $table->bigInteger('job_type_id')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->string('detail',50)->nullable()->index();
            $table->string('business_skill',50)->nullable()->index();
            $table->string('knowledge',50)->nullable()->index();
            $table->string('location',50)->nullable()->index();
            $table->string('activity',50)->nullable()->index();
            $table->string('academic_degree_doctor',50)->nullable();
            $table->string('academic_degree_master',50)->nullable();
            $table->string('academic_degree_professional',50)->nullable();
            $table->string('academic_degree_bachelor',50)->nullable();
            $table->string('salary_statistic_group',50)->nullable()->index();
            $table->string('salary_range_first_year',50)->nullable();
            $table->string('salary_range_average',50)->nullable();
            $table->string('salary_range_remarks',50)->nullable()->index();
            $table->string('restriction',50)->nullable()->index();
            $table->string('remarks',50)->nullable()->index();
            $table->integer('estimated_total_workers')->nullable();
            $table->string('url',50)->nullable();
            $table->string('seo_description',50)->nullable();
            $table->string('seo_keywords',50)->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('publish_status',50)->nullable();
            $table->string('version',50)->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('created',50)->nullable();
            $table->string('modified',50)->nullable();
            $table->string('deleted',50)->nullable();

            $table->foreign('job_category_id')->references('id')->on('job_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
