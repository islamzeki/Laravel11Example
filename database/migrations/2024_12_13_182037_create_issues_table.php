<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('difficulty');
            $table->unsignedInteger('duration');
            $table->unsignedTinyInteger('provider_id');
            $table->unsignedTinyInteger('provider_issue_id');
            $table->timestamps();
            $table->unique(['provider_id','provider_issue_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
