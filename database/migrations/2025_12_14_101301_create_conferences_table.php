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
    Schema::create('conferences', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->text('description');
        $table->text('speakers'); // lektor
        $table->date('start_date');
        $table->time('start_time');
        $table->string('address');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
