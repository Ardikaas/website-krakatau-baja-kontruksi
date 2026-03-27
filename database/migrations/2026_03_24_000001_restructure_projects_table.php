<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn([
                'client',
                'category',
                'date',
                'scope_of_work',
                'challenges',
                'solutions',
                'image',
            ]);
        });

        // Check and drop _en columns added outside migration
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'category_en')) {
                $table->dropColumn('category_en');
            }
            if (Schema::hasColumn('projects', 'scope_of_work_en')) {
                $table->dropColumn('scope_of_work_en');
            }
            if (Schema::hasColumn('projects', 'challenges_en')) {
                $table->dropColumn('challenges_en');
            }
            if (Schema::hasColumn('projects', 'solutions_en')) {
                $table->dropColumn('solutions_en');
            }
        });

        Schema::table('projects', function (Blueprint $table) {
            // Add new columns
            $table->json('images')->nullable()->after('description_en');
            $table->string('what')->after('title_en');
            $table->string('what_en')->nullable()->after('what');
            $table->string('location_en')->nullable()->after('location');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['images', 'what', 'what_en', 'location_en']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('client');
            $table->string('category');
            $table->string('category_en')->nullable();
            $table->date('date');
            $table->text('scope_of_work');
            $table->text('scope_of_work_en')->nullable();
            $table->text('challenges');
            $table->text('challenges_en')->nullable();
            $table->json('solutions');
            $table->json('solutions_en')->nullable();
            $table->string('image')->nullable();
        });
    }
};
