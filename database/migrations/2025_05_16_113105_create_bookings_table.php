<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->Integer('companion_id')->nullable();
            $table->Integer('associate_id')->nullable();
            $table->string('day')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
