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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('category_en')->nullable()->after('category');
            $table->text('description_en')->nullable()->after('description');
            $table->text('scope_of_work_en')->nullable()->after('scope_of_work');
            $table->text('challenges_en')->nullable()->after('challenges');
            $table->json('solutions_en')->nullable()->after('solutions');
        });

        Schema::table('why_choose_us', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
        });

        Schema::table('about_histories', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
        });

        Schema::table('about_people', function (Blueprint $table) {
            $table->string('position_en')->nullable()->after('position');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
        });

        Schema::table('about_settings', function (Blueprint $table) {
            $table->text('value_en')->nullable()->after('value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'title_en', 
                'category_en', 
                'description_en', 
                'scope_of_work_en', 
                'challenges_en', 
                'solutions_en'
            ]);
        });

        Schema::table('why_choose_us', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });

        Schema::table('about_histories', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });

        Schema::table('about_people', function (Blueprint $table) {
            $table->dropColumn('position_en');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('title_en');
        });

        Schema::table('about_settings', function (Blueprint $table) {
            $table->dropColumn('value_en');
        });
    }
};
