<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_issues', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("code");
            $table->string("description");
            $table->string("attack_scenario");
            $table->string("recommendation");
            $table->string("updates");

            $table->enum('severity', ['CRITICAL', 'HIGH','MEDIUM','LOW','INFORMATIONAL','UNDETERMINED']);
            $table->enum('likelihood', [1, 2,3]);

            $table->enum('impact', [-1,0,1,2,3]);
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
        Schema::dropIfExists('project_issues');
    }
}
