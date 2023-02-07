<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBestPracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_best_practices', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("code");
            $table->string("description");


            $table->enum('status', ['Not Fixed', 'Fixed','Mitigated','Achnowledged','Partially Fixed']);
            $table->enum('state', ['Draft', 'Approved','Pending','Duplicated',',Not Approved']);

            $table->foreignUuid('audit_projects_id')->constrained();
            $table->foreignUuid('user_id')->constrained();

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
        Schema::dropIfExists('project_best_practices');
    }
}
