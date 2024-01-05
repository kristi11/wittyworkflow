<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string('mainQuote')->default('Main quote goes here');
            $table->string('secondaryQuote')->nullable()->default('Second quote goes here');
            $table->string('thirdQuote')->nullable()->default('Third quote goes here');
            $table->integer('gradientDegree')->default('90');
            $table->string('gradientFirstColor')->default('#d53369');
            $table->integer('gradientDegreeStart')->default('0');
            $table->string('gradientSecondColor')->default('#daae51');
            $table->integer('gradientDegreeEnd')->default('100');
            $table->string('image')->nullable();
            $table->boolean('waves')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
