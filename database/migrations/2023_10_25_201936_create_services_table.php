<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string('name');
            $table->text('description');
            $table->integer('price')->nullable();
            $table->integer('estimated_hours')->nullable();
            $table->integer('estimated_minutes')->nullable();
            $table->string('extra_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
