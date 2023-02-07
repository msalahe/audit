<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("name");
            $table->date("start_date");
            $table->date("finish_date");
            $table->string("jira_id");
            $table->string("slack_channel");
            $table->string("client");
            $table->string("description");
            $table->string("website");
            $table->string("audit_type");
            $table->string("audit_method");
            $table->string("status");
            $table->boolean("is_published");
            $table->string("summary");
            $table->string("disclaimer");
            $table->string("findings");
            $table->string("conclusion");
            $table->enum('type', ['private', 'public']);
            $table->foreignUuid('users_id')->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('audit_projects');
    }
}
