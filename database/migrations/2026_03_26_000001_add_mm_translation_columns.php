<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title_mm')->nullable()->after('title');
            $table->string('preview_mm')->nullable()->after('preview');
            $table->longText('content_mm')->nullable()->after('content');
        });

        Schema::table('careers', function (Blueprint $table) {
            $table->string('title_mm')->nullable()->after('title');
            $table->longText('ignite_mm')->nullable()->after('ignite');
            $table->longText('role_mm')->nullable()->after('role');
            $table->longText('benefits_mm')->nullable()->after('benefits');
            $table->longText('requirements_mm')->nullable()->after('requirements');
            $table->longText('responsibilities_mm')->nullable()->after('responsibilities');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('title_mm')->nullable()->after('title');
            $table->string('name_mm')->nullable()->after('name');
            $table->longText('main_content_mm')->nullable()->after('main_content');
            $table->longText('tags_mm')->nullable()->after('tags');
            $table->longText('sub_content_mm')->nullable()->after('sub_content');
        });

        Schema::table('our_works', function (Blueprint $table) {
            $table->string('title_mm')->nullable()->after('title');
            $table->longText('content_mm')->nullable()->after('content');
        });

        Schema::table('ventures', function (Blueprint $table) {
            $table->string('title_mm')->nullable()->after('title');
            $table->longText('content_mm')->nullable()->after('content');
        });

        Schema::table('testimornials', function (Blueprint $table) {
            $table->string('name_mm')->nullable()->after('name');
            $table->longText('description_mm')->nullable()->after('description');
        });

        Schema::table('seos', function (Blueprint $table) {
            $table->string('title_mm')->nullable()->after('title');
            $table->string('description_mm')->nullable()->after('description');
            $table->string('keyword_mm')->nullable()->after('keyword');
        });
    }

    public function down(): void
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->dropColumn(['title_mm', 'description_mm', 'keyword_mm']);
        });

        Schema::table('testimornials', function (Blueprint $table) {
            $table->dropColumn(['name_mm', 'description_mm']);
        });

        Schema::table('ventures', function (Blueprint $table) {
            $table->dropColumn(['title_mm', 'content_mm']);
        });

        Schema::table('our_works', function (Blueprint $table) {
            $table->dropColumn(['title_mm', 'content_mm']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['title_mm', 'name_mm', 'main_content_mm', 'tags_mm', 'sub_content_mm']);
        });

        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn(['title_mm', 'ignite_mm', 'role_mm', 'benefits_mm', 'requirements_mm', 'responsibilities_mm']);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['title_mm', 'preview_mm', 'content_mm']);
        });
    }
};
