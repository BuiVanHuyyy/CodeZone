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
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('slug', 100);
                $table->string('nickname', 100)->nullable();
                $table->string('avatar', 255)->nullable();
                $table->string('phone_number', 255)->unique();
                $table->boolean('gender')->default('0')->comment('1=Female, 0=Male');
                $table->date('dob')->nullable();
                $table->text('bio')->nullable();
                $table->foreignId('user_id')->constrained('users');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('students');
        }
    };
