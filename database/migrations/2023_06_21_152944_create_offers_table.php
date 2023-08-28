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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            // $table->string('expected_duration');
            // $table->float('price');
            // $table->string('Work_details');
            $table->string('note')->nullable();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
