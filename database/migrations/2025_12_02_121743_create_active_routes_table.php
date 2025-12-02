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
        Schema::create('active_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->integer('role')->default(0); // 0 historian, 1 explorer/scout, 2 photographer, 3 sketcher
            $table->boolean('is_completed')->default(false);
            $table->integer('current_checkpoint')->default(0);
            $table->integer('points')->default(0);
            $table->date('start_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_routes');
    }
};
