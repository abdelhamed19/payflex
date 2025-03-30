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
        Schema::create('sidebar_childrens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sidebar_id')->nullable()->constrained('sidebars')->cascadeOnDelete();
            $table->json('name');
            $table->string('icon')->nullable();
            $table->string('route')->nullable();
            $table->string('route_name')->nullable();
            $table->string('route_params')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidebar_childrens');
    }
};
