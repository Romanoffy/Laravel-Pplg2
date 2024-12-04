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
            $table->string("student_name", 100);
            $table->enum("student_class", ["X", "XI", "XII"]);
            $table->enum("student_major", ["PPLG", "DKV", "TJKT", "MPLB", "HR", "TMP", "TBSM", "TKRO"]);
            $table->string("photo");
            $table->string("photo_name");
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
