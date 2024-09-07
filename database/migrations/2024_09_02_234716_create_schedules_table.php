<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('time_range');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('total_time')->nullable();
            $table->timestamps();
        });
        DB::table('schedules')->insert([
            ['time_range' => '9:00am-10:00am', 'start_time' => '09:00:00', 'end_time' => '10:00:00', 'total_time' => 60],
            ['time_range' => '10:00am-11:00am', 'start_time' => '10:00:00', 'end_time' => '11:00:00', 'total_time' => 60],
            ['time_range' => '11:00am-12:00pm', 'start_time' => '11:00:00', 'end_time' => '12:00:00', 'total_time' => 60],
            ['time_range' => '12:00pm-1:00pm', 'start_time' => '12:00:00', 'end_time' => '13:00:00', 'total_time' => 60],
            ['time_range' => '1:00pm-2:00pm', 'start_time' => '13:00:00', 'end_time' => '14:00:00', 'total_time' => 60],
            ['time_range' => '2:00pm-3:00pm', 'start_time' => '14:00:00', 'end_time' => '15:00:00', 'total_time' => 60],
            ['time_range' => '3:00pm-4:00pm', 'start_time' => '15:00:00', 'end_time' => '16:00:00', 'total_time' => 60],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
