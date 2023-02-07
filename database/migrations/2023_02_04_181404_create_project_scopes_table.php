<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectScopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_scopes', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("link");
            $table->string("value");

            $table->enum('type', ['Contract', 'Github','GitLab']);

           


            $table->foreignid('statuses_id')->constrained();
            $table->foreignUuid('audit_projects_id')->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('project_scopes');
    }
}
