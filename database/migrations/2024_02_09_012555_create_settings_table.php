<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('appointmentsVisibility')->default(true);
            $table->boolean('hoursVisibility')->default(false);
            $table->boolean('galleriesVisibility')->default(false);
            $table->boolean('servicesVisibility')->default(false);
            $table->boolean('socialsVisibility')->default(false);
            $table->boolean('seoVisibility')->default(false);
            $table->boolean('addressVisibility')->default(false);
            $table->boolean('heroVisibility')->default(false);
            $table->boolean('alwaysOpen')->default(false);
            $table->boolean('flexiblePricing')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
