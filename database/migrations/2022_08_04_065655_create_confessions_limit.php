<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confessions_limits', function (Blueprint $table) {
            $table->id();
            $table->text("userID");
            $table->integer("confessionsCount");
            $table->timestamp("updated_at");
            $table->timestamp("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confessions_limits');
    }
};
