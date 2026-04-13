<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reading_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('novel_id');
            $table->unsignedBigInteger('chapter_id');
            $table->timestamps();

            // relasi (optional tapi bagus)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('novel_id')->references('id')->on('novels')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reading_histories');
    }
};