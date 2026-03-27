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
            $table->dropColumn(['position_duration', 'position_duration_en']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_people', function (Blueprint $table) {
            $table->string('position_duration')->nullable();
            $table->string('position_duration_en')->nullable();
            $table->dropColumn(['start_date', 'end_date']);
        });
    }
};
