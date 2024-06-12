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
            Schema::create('comments', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('commentable_id');
                $table->string('commentable_type',  30);
                $table->text('content');
                $table->softDeletes();
                $table->timestamps();

                $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
                $table->index(['commentable_id', 'commentable_type', 'user_id']);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('comments');
        }
    };
