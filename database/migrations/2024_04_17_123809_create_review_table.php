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
            Schema::create('reviews', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('reviewable_id');
                $table->string('reviewable_type',  30);
                $table->integer('rating');
                $table->text('content');
                $table->softDeletes();
                $table->timestamps();

                $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
                $table->index(['reviewable_id', 'reviewable_type', 'user_id', 'rating']);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('reviews');
        }
    };
