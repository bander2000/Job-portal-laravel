<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedInteger('catogry_id');
            $table->foreign('catogry_id')->references('id')->on('catogries');
            $table->string('title');
            $table->integer('status');
            $table->double('minSalary');
            $table->double('maxSalary');
            $table->string('type');
            $table->text('description');
            $table->String('location');
            $table->text('requiredKnowledge');
            $table->text('education');
            $table->date('lastDate');
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
        Schema::dropIfExists('jobs');
    }
}
