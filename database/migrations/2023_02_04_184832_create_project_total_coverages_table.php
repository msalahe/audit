<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTotalCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_total_coverages', function (Blueprint $table) {
            $table->id();
            $table->integer("coverage");
            $table->integer("statements");
            $table->integer("branches");
            $table->integer("functions");
            $table->integer("lines");

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
        Schema::dropIfExists('project_total_coverages');
    }
}
