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
        Schema::create('fees_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('fee type name');
            $table->string('code')->comment('fee type code');
            $table->string('description')->nullable()->comment('fee type description');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_types');
    }
};
