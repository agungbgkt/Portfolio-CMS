<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('summary', 500);
            $table->text('description');
            $table->string('thumbnail_url', 500)->nullable();
            $table->string('github_url', 500)->nullable();
            $table->string('demo_url', 500)->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->string('status', 20)->default('draft')->index();
            $table->integer('views_count')->default(0);
            $table->date('completed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
