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
        Schema::create('monthly', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->text("description");
            $table->text("tags");
            $table->decimal('price', 6, 2);
            $table->text("paid_by");
            $table->boolean("same_price")->default(1);
            $table->date("start_date");
            $table->date("last_inserted_date")->nullable();
            $table->date("end_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly');
    }
};
