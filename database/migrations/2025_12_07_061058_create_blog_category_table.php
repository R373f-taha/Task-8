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
        //the pivot table between blog table and category table
        
        Schema::create('blog_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories','id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('blog_id')->constrained('blogs','id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_category');
    }
};
