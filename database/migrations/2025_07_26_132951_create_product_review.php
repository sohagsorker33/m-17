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
        Schema::create('product_review', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            // K-key
            $table->string('email');
            $table->unsignedBigInteger('product_id');
            $table->foreign('email')->references('email')->on('newprofiles')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            $table->foreign('product_id')->references('id')->on('products')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_review');
    }
};
