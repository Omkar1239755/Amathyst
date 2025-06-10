<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->integer('companion_id')->nullable();
            $table->integer('total_earn')->nullable();
            $table->integer('earning_drawn')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('earnings');
    }
};
