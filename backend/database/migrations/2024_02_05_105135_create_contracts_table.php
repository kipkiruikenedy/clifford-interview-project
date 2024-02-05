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
        Schema::create('contracts', function (Blueprint $table) {
                $table->id();
                $table->decimal('contract_rates', 8, 2);
                $table->date('start_date');
                $table->date('end_date');
                $table->unsignedBigInteger('accommodation_id');
                $table->unsignedBigInteger('user_id');
                $table->timestamps();
        
                                  // Foreign key for Accommodation
                $table->foreign('accommodation_id')->references('id')->on('accommodations');
                     // Foreign key for Travel Agent
                $table->foreign('user_id')->references('id')->on('users');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
