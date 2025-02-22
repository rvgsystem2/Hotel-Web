<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('main_image');
            $table->text('gallery_images'); // Store as comma-separated values
            $table->text('prime'); // Store as text
            $table->text('quick_access'); // Store as text
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('about_sections');
    }
};
