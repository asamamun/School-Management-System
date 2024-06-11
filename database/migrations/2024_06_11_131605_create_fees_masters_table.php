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
        Schema::create('fees_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fees_group_id')->nullable();
            $table->foreign('fees_group_id')->references('id')->on('fees_groups')->onDelete('cascade');
            $table->unsignedBigInteger('fees_type_id')->nullable();
            $table->foreign('fees_type_id')->references('id')->on('fees_types')->onDelete('cascade');
            $table->date('duedate')->nullable();
            $table->float('amount')->nullable();
            //fine type.percentage, fine abount
            $table->set('fine_type',['percentage','amount'])->default('percentage')->nullable();
            $table->float('fine_amount')->nullable()->default(0);
            $table->integer('fine_percentage')->nullable()->default(0);
            $table->set('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_masters');
    }
};
