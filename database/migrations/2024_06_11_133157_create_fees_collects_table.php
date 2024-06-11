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
        Schema::create('fees_collects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fees_assign_id')->nullable();
            $table->foreign('fees_assign_id')->references('id')->on('fees_masters')->onDelete('cascade');
            $table->set('payment_type', ['cash', 'bKash', 'nagad', 'upay'])->nullable();
            $table->string('trxid')->nullable();
            $table->float('amount')->nullable();
            $table->date('date')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_collects');
    }
};
