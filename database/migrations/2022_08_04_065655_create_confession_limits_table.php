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
        Schema::create('confession_limits', function (Blueprint $table) {
            $table->id();
            $table->integer("confessions_count");
            // id of user
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
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
