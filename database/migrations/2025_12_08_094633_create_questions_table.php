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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('mission_id')->constrained()->onDelete('cascade');
            $table->text('question');
            $table->text('answer_1');
            $table->text('answer_2')->nullable();
            $table->text('answer_3')->nullable();
            $table->text('answer_4')->nullable();
            $table->integer('correct_answer'); // 1, 2 of 3
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
