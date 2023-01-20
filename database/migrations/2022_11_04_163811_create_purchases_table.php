<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->timestamp("reference");
            $table->text("description");
            $table->text("tags");
            $table->integer('actual_installment')->nullable();
            $table->integer('number_of_installments')->nullable();
            $table->decimal('price_of_installments', 6, 2)->nullable();
            $table->decimal('price', 6, 2);
            $table->text("paid_by");
            $table->boolean('is_monthly')->default(0);
            $table->boolean("is_paid")->default(1);
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
        Schema::dropIfExists('purchases');
    }
};
