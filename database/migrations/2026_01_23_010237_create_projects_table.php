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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->text('scope')->nullable();
            $table->string('location')->nullable();
            $table->string('client')->nullable();
            $table->date('date')->nullable();
            $table->string('category')->nullable();
            $table->text('challenges');
            $table->json('solutions'); // array of object
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
