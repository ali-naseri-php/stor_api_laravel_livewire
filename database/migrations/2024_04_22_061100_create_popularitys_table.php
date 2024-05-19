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
        Schema::create('popularitys', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->integer('privates');
            $table->integer('popularityable_id');
            $table->string('popularityable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popularitys');
    }
};
