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
        //
        Schema::create('cart_detai', function (Blueprint $table) {
            $table->id();
            $table->int('cart_detai_id');
            $table->string('cart_detai_name');
            $table->string('cart_detai_price'); 
            $table->string('cart_detai_quantity'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
