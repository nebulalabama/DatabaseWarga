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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->string('pob');
            $table->string('dob');
            $table->enum('gender', ['L', 'P']);
            $table->enum('religion', ['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'lainnya']);
            $table->enum('last_education', ['SD', 'SMP', 'SMA', 'Sarjana', 'Diploma', 'Doktor']);
            $table->enum('citizenship', ['WNI', 'WNA']);
            $table->enum('marital_status', ['nikah', 'belum nikah']);
            $table->bigInteger('sub_district_id')->unsigned()->nullable();
            $table->bigInteger('neighborhood_id')->unsigned()->nullable();
            $table->bigInteger('community_unit_id')->unsigned()->nullable();
            // $table->bigInteger('family_card_detail_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
