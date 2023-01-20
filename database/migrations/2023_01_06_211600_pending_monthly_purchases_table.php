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
        Schema::create('pending_monthly_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->timestamp("reference");
            $table->text("description");
            $table->text("tags");
            $table->text("paid_by");
            $table->foreignId("monthly_id")->references('id')->on('monthly');
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
        //
    }
};
