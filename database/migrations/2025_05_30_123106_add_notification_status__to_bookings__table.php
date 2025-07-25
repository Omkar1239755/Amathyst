<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
                $table->tinyInteger('notification_status')->default('0'); 
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
           
        });
    }
};
