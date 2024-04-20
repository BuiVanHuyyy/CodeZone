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
                $table->id();
                $table->string('title', 100)->unique();
                $table->string('slug', 150)->unique();
                $table->double('price', 10, 2);
                $table->text('description')->nullable();
                $table->string('thumbnail', 100)->nullable();
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                $table->foreignId('instructor_id')->constrained('instructors');
                $table->foreignId('course_category_id')->constrained('course_categories');
                $table->softDeletes();
                $table->timestamps();
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
