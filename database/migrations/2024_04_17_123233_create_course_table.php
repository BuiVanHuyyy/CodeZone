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
            Schema::create('courses', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('title', 100)->unique();
                $table->string('slug', 150)->unique();
                $table->double('price', 10, 2);
                $table->text('description')->nullable();
                $table->string('thumbnail', 100)->nullable();
                $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending');
                $table->softDeletes();
                $table->timestamps();

                $table->foreignUuid('instructor_id')->constrained('instructors');
                $table->foreignUuid('course_category_id')->constrained('course_categories');
                $table->index(['status', 'title', 'price', 'instructor_id']);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('courses');
        }
    };
