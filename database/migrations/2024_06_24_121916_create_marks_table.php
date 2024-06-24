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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            //student_id, subject_id, standard_id, exam_id, ct1,ct2, main,total, grade,pos,remarks
            $table->unsignedBigInteger('student_id')->required();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict');
            $table->unsignedBigInteger('subject_id')->required();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('restrict');
            $table->unsignedBigInteger('standard_id')->required();
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('restrict');
            $table->unsignedBigInteger('exam_id')->required();
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('restrict');
            $table->float('ct1', 5, 2)->nullable();
            $table->float('ct2', 5, 2)->nullable();
            $table->float('main', 5, 2)->nullable();
            $table->float('total', 5, 2)->nullable();
            $table->unsignedBigInteger('grade_id')->required();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('restrict');
            $table->string('pos')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            //(unique - student_id,subject_id,standard_id,exam_id)
            $table->unique(['student_id', 'subject_id', 'standard_id', 'exam_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
