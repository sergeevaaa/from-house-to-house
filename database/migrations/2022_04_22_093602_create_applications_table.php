<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('festival_id')->constrained('festivals')->onDelete('cascade');
            $table->foreignId('member_status_id')->constrained('member_statuses')->onDelete('cascade');
            $table->string('name');
            $table->foreignId('technology_id')->nullable()->constrained('technologies')->onDelete('cascade');
            $table->string('technology')->nullable();
            $table->string('organization');
            $table->longText('video')->nullable();;
            $table->foreignId('app_status_id')->constrained('application_statuses')->onDelete('cascade');
            $table->string('note')->nullable();
            $table->string('certificate')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
