<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    #squad table
    public function up(): void
    // foreign id means to reference the primary key on another table, key here being the user tabele
    // constrained is specifying which table to reference from
    // cascadeondelete, when deleted from user table, all record with foreign key will be deleted
    {
        Schema::create('squads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable(); #text allows more characters to be inside
            $table->string('status');
            $table->foreignId('coachId')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('squads');
    }
};
