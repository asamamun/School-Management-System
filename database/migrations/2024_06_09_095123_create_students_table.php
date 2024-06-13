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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            //Admission NO, Roll No, first name, last name, mobile, email, standard_id, section_id, shift_id, dob, religion, gender, blood group, admission date, image, guardian name, guardian mobile, address, nationality,birth certificate,status, created_at, updated_at
            $table->string('admission_no')->required();
            $table->string('roll_no')->required();
            $table->string('first_name')->required();
            $table->string('last_name')->required();
            $table->string('mobile')->required();
            $table->string('email')->required();
            //user_id foreign key
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //standard_id foreign key
            $table->unsignedBigInteger('standard_id');
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');            
            //section_id foreign key
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            //shift_id foreign key
            $table->unsignedBigInteger('shift_id');
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade');
            $table->date('dob')->required();
            $table->set('religion', ['islam', 'hindu', 'christian', 'buddhist', 'other'])->required();
            $table->set('gender', ['male', 'female', 'other'])->required();
            $table->set('blood_group', ['a+', 'a-', 'b+', 'b-', 'o+', 'o-', 'ab+', 'ab-'])->required();
            $table->date('admission_date')->required();
            $table->string('image')->required();
            $table->string('guardian_name')->required();
            $table->string('guardian_mobile')->required();
            $table->string('address')->required();
            $table->string('nationality')->required();
            $table->string('birth_certificate')->nullable();
            $table->set('admission_status', ['applied','assigned','canceled'])->default('applied');
            $table->set('status', ['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
