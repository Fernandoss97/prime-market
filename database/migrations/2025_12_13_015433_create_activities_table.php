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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('activity_categories');
            $table->foreignId('establishment_id')->constrained('establishments');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('duration_minutes');
            $table->integer('max_participants');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->decimal('adult_price', 8, 2);
            $table->decimal('child_price', 8, 2)->nullable();
            $table->string('main_image_path')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->decimal('average_rating', 3, 2)->default(0.00);
            $table->integer('total_reviews')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
