<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mission_id')->constrained()->onDelete('cascade');
            $table->string('question');
            $table->bigInteger('answer_1');
            $table->bigInteger('answer_2');
            $table->bigInteger('answer_3');
            $table->bigInteger('answer_4');
            $table->bigInteger('correct_answer_1');
            $table->bigInteger('correct_answer_2')->nullable();
            $table->bigInteger('correct_answer_3')->nullable();
            $table->bigInteger('correct_answer_4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
