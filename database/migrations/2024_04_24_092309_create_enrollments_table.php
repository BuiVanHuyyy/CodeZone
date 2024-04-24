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
                $table->id();
                $table->foreignId('order_id')->constrained('orders');
                $table->foreignId('student_id')->constrained('students');
                $table->foreignId('course_id')->constrained('courses');
                $table->double('price', 10, 2);
                $table->enum('status', ['paid', 'pending', 'failed'])->default('pending');
                $table->softDeletes();
                $table->timestamps();
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
