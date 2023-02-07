<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectScopeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_scope_files', function (Blueprint $table) {
            $table->id();
            $table->string("file");
            $table->string("hash");
            $table->string("extension");


            $table->foreignUuid('audit_projects_id')->constrained();
            $table->foreignid('statuses_id')->constrained();

            

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
        Schema::dropIfExists('project_scope_files');
    }
}
