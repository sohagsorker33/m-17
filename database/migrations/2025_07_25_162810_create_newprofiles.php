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
        Schema::create('newprofiles', function (Blueprint $table) {
            $table->id();
            $table->string('fristName');
            $table->string('lastName');
            $table->string('mobile');
            $table->string('city');
            $table->string('shippingAddress');
            $table->string('email')->unique();
            // relationship--------------------------------------------------------------
            $table->foreign('email')->references('email')->on('newusers')
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
        Schema::dropIfExists('newprofiles');
    }
};
