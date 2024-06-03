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
                $table->uuid('id')->primary();
                $table->string('title', 100);
                $table->string('slug', 100);
                $table->integer('order');
                $table->text('content')->nullable();
                $table->string('video', 100)->nullable();
                $table->string('resource', 100)->nullable();
                $table->boolean('is_preview')->default(false);
                $table->timestamps();
                
                $table->foreignUuid('subject_id')->constrained('subjects')->onDelete('cascade');
                $table->index(['slug', 'title']);
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
