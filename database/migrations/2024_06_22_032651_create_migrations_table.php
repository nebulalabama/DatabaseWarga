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
        Schema::create('migration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resident_id');
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
            $table->date('date');
            $table->string('from', 50);
            $table->string('to', 50);
            $table->text('cause');
            $table->enum('migration_type', ['internal', 'international', 'temporary', 'permanent']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migration');
    }
};
