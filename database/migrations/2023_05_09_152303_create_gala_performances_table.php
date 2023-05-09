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
        Schema::create('gala_performances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('time');
            $table->string('point');
            $table->string('position');
            $table->string('stroke');
            $table->foreignId('swimmerId')->constrained('users')->cascadeOnDelete();
            $table->foreignId('galaId')->constrained('galas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gala_performances');
    }
};
