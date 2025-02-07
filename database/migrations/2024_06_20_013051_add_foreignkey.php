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
        Schema::table('residents', function (Blueprint $table) {
            $table->foreign('sub_district_id')->references('id')->on('sub_districts')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreign('community_unit_id')->references('id')->on('community_units')->onDelete('cascade')->onUpdate('cascade')->nullable();
            // $table->foreign('family_card_detail_id')->references('id')->on('family_card_details')->onDelete('cascade')->onUpdate('cascade')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('residents', function (Blueprint $table) {
            $table->dropForeign(['sub_district_id']);
            $table->dropForeign(['neighborhood_id']);
            $table->dropForeign(['community_unit_id']);
            // $table->dropForeign(['family_card_detail_id']);
        });
    }
};
