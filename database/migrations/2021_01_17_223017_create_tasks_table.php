<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('creator_id');
            $table->integer('assignee_id')->nullable();
            $table->string('title', 255);
            $table->longText('description');
            $table->integer('type_id');
            $table->integer('progress_id')->default(1);
            $table->enum('priority', ['lowest', 'low', 'medium', 'high', 'highest'])->default('lowest');
            $table->json('tags')->nullable();
            $table->string('est_duration')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
