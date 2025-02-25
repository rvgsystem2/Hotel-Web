<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hotel_offerings', function (Blueprint $table) {
            $table->id();
            $table->string('icon'); // Material icon name
            $table->string('title');
            $table->text('short_description'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_offerings');
    }
};
