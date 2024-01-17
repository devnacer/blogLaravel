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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('content');
            $table->string('image', 255)->nullable();

            $table->unsignedBigInteger('profil_id');
            $table->foreign('profil_id')->references('id')->on('profils')->cascadeOnDelete();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('articles');
    }
};
