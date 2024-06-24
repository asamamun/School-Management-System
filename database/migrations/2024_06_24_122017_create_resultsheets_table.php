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
        Schema::create('resultsheets', function (Blueprint $table) {
            $table->id();
            //id, session, exam_id, standard_id, student_id, total, avg, classavg, pos, af, ps, p_comment, t_comment, created_at, updated_at
            $table->string('session');
            $table->unsignedBigInteger('exam_id')-> required();
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('restrict');
            $table->unsignedBigInteger('standard_id')->required();
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('restrict');
            $table->unsignedBigInteger('student_id')->required();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict');
            $table->float('total', 5, 2);
            $table->float('avg', 5, 2);
            $table->float('classavg', 5, 2);
            $table->string('pos')->nullable()->comment('Position');
            $table->string('af')->nullable()->comment('Affective traits');
            $table->string('ps')->nullable()->comment('Psychomotor skills');
            $table->string('p_comment')->comment('principal comment')->nullable();
            $table->string('t_comment')->comment('teacher comment')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultsheets');
    }
};
