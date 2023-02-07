<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTestScenarionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_test_scenarions', function (Blueprint $table) {
            $table->id();
            $table->string("test_scenario");

            $table->enum('severity', ['passed', 'field']);


            $table->foreignUuid('audit_projects_id')->constrained();
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
        Schema::dropIfExists('project_test_scenarions');
    }
}
