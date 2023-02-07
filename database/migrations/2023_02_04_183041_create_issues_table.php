<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->string("attack_scenario");
            $table->string("recommendation");

            $table->enum('severity', ['CRITICAL', 'HIGH','MEDIUM','LOW','INFORMATIONAL','UNDETERMINED']);
            $table->enum('likelihood', [1, 2,3]);

            $table->enum('impact', [-1,0,1,2,3]);

            $table->foreignid('categories_id')->constrained();

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
        Schema::dropIfExists('issues');
    }
}
