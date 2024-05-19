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
        Schema::create('kalavisits', function (Blueprint $table) {
            $table->id();
            $table->integer('number');

            $table->bigInteger('kala_id')->unsigned();

            $table->foreign('kala_id')->references('id')->on('kalas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalavisits');
    }
};
