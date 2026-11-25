<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->string('full_name');
            $table->string('headline');
            $table->string('headline');
            $table->text('short_bio');
            $table->text('about_description');
            $table->string('avatar_url', 500)->nullable();
            $table->string('resume_url', 500)->nullable();
            $table->string('email_public');
            $table->string('phone', 50)->nullable();
            $table->string('location')->nullable();
            $table->jsonb('social_links')->nullable();
            $table->smallInteger('years_of_experience')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
