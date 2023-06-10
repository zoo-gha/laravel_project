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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->string('status');
            $table->datetime('order_date');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->decimal('grand_total', 16, 2)->default(0);
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_city');
            $table->string('user_adresse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
