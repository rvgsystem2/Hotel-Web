<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_type_id')->constrained()->onDelete('cascade');
            $table->integer('capacity')->default(1);
            $table->decimal('price', 10, 2);
            $table->boolean('is_available')->default(true);
            $table->text('images')->nullable(); // Store multiple image paths as comma-separated values
            $table->string('title'); // Added title field
            $table->text('description'); // Added description field
            $table->string('location'); // Added location field
            $table->integer('distance_from_station')->nullable(); // Added distance field
            $table->string('link')->nullable(); // Added link field
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('rooms');
    }
};