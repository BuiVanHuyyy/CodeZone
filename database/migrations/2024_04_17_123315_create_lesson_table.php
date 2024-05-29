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
            Schema::create('lessons', function (Blueprint $table) {
                $table->id();
                $table->string('title', 100)->unique();
                $table->string('slug', 100)->unique();
                $table->integer('order');
                $table->text('content')->nullable();
                $table->text('video')->nullable();
                $table->text('resource')->nullable();
                $table->boolean('is_preview')->default(false);
                $table->foreignId('subject_id')->constrained('subjects');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('lessons');
        }
    };
