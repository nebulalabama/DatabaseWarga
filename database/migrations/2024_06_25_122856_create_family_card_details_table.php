<?php
// database/migrations/xxxx_xx_xx_create_family_card_details_table.php

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
        Schema::create('family_card_details', function (Blueprint $table) {
            $table->id();
            $table->string('family_card_id'); // Menyimpan family_card_id tanpa foreign key constraint
            $table->string('resident_id'); // Menyimpan resident_id tanpa foreign key constraint
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_card_details');
    }
};
