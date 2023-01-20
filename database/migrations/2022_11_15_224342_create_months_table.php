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
        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->date('month_reference');
            $table->double('total_price', 6, 2);
            $table->double('media_by_day', 6, 2);
            $table->integer('number_of_days');
            $table->text('start_day')->nullable();
            $table->text('end_day')->nullable();
            $table->boolean('closed')->default(false);
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
        Schema::dropIfExists('months');
    }
};
