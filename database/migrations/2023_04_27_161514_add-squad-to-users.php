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
        //
        Schema::table('users', function (Blueprint $table) {
            
            #this code below  is to call the squads in the squad table to link it to a record on the squad table
            #nullable is to show that not everyone belongs to a squad, so value can be null
            $table->foreignId('squadId')->nullable()->constrained('squads');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            
            // $table->dropColumn('squadId');
        });
    }
};
