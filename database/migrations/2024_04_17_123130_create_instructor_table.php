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
            Schema::create('instructors', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('current_job', 100)->nullable();
                $table->text('education')->nullable();
                $table->string('phone_number', 20)->unique();
                $table->text('bio')->nullable();
                $table->string('cv_upload', 100)->nullable();
                $table->string('facebook', 100)->nullable();
                $table->string('github', 100)->nullable();
                $table->string('linkedin', 100)->nullable();
                $table->softDeletes();
                $table->timestamps();

                $table->foreignUuid('user_id')->constrained('users');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('instructors');
        }
    };
