<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bonuses', function (Blueprint $table) {
            $table->enum('status', ['afwachting', 'goedgekeurd', 'afgewezen'])->default('afwachting');
        });
    }

    public function down()
    {
        Schema::table('bonuses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
