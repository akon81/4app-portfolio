<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_tech_stack', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('tech_stack_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('tech_stack_id')->references('id')->on('tech_stacks')->onDelete('cascade');
            $table->unique(['project_id', 'tech_stack_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_tech_stack');
    }
};
