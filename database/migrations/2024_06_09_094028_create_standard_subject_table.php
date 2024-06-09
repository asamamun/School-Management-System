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
        Schema::create('standard_subject', function (Blueprint $table) {
            $table->id();
            //standatd id
            $table->unsignedBigInteger('standard_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('user_id');       
            $table->unique(['standard_id', 'subject_id']);
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('restrict');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_subject');
    }
};
