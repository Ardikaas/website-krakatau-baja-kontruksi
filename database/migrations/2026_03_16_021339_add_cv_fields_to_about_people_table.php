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
        Schema::table('about_people', function (Blueprint $table) {
            $table->text('summary')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('previous_jobs')->nullable();
            $table->text('previous_jobs_en')->nullable();
            $table->string('full_body_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_people', function (Blueprint $table) {
            $table->dropColumn([
                'summary',
                'summary_en',
                'previous_jobs',
                'previous_jobs_en',
                'full_body_image'
            ]);
        });
    }
};
