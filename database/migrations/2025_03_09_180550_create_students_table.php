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
            $table->string('name');
            $table->string('nipd');
            $table->string('nisn');
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('parent_name');
            $table->string('address');
            $table->string('village');
            $table->string('district');
            $table->string('religion');
            $table->string('rombel');
            $table->timestamps();
            $table->softDeletes();
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
