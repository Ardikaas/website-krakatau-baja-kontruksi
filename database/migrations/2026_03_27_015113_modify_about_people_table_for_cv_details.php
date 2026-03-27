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
            $table->dropColumn(['summary', 'summary_en', 'previous_jobs', 'previous_jobs_en']);
            
            $table->string('position_duration')->nullable()->after('position_en');
            $table->string('position_duration_en')->nullable()->after('position_duration');
            $table->json('career_history')->nullable()->after('image');
            $table->json('organization_history')->nullable()->after('career_history');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_people', function (Blueprint $table) {
            $table->text('summary')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('previous_jobs')->nullable();
            $table->text('previous_jobs_en')->nullable();
            
            $table->dropColumn(['position_duration', 'position_duration_en', 'career_history', 'organization_history']);
        });
    }
};
