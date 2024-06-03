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
            Schema::create('enrollments', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->double('price', 10, 2);
                $table->enum('status', ['paid', 'pending', 'failed'])->default('pending');
                $table->softDeletes();
                $table->timestamps();

                $table->foreignUuid('order_id')->constrained('orders');
                $table->foreignUuid('student_id')->constrained('students');
                $table->foreignUuid('course_id')->constrained('courses');
                $table->index(['status', 'student_id', 'course_id', 'price']);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('enrollments');
        }
    };
