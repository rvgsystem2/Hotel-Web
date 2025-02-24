<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('smart_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('icon');
            $table->string('image');
            $table->string('badge_text')->nullable();
            $table->string('badge_color')->nullable();
            // $table->json('features');
            $table->string('cta_text')->nullable();
            // $table->string('cta_link')->nullable();
            // $table->foreignId('category_id')->nullable()->constrained('service_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('smart_services');
    }
};