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
            Schema::create('subjects', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('title', 100);
                $table->string('slug', 100);
                $table->integer('order');
                $table->timestamps();

                $table->foreignUuid('course_id')->constrained('courses');
                $table->index(['slug', 'title']);

            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('subjects');
        }
    };
