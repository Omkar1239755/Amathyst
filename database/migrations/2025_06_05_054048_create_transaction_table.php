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
        Schema::create('transaction', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->string('transaction_id')->nullable();
            $table->string('Gems')->nullable();
            $table->integer('Amount')->nullable();
            $table->string('status')->default('0')->comment("0:pending,1:completed,2:failed"); 
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
