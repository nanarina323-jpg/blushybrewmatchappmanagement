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
        Schema::create('drinkflas', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100);
            $table->string('flavourname',255);
            $table->string('ingredient',255);
            $table->string('categorycode',100);
            $table->double('price', 2 ,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drinkflas');
    }
};
