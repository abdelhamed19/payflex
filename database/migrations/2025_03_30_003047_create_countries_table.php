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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('iso3', 3)->nullable();
            $table->string('iso2', 2)->nullable();
            $table->string('numeric_code', 10)->nullable();
            $table->string('phone_code', 10)->nullable();
            $table->string('capital')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symbol', 10)->nullable();
            $table->string('tld', 10)->nullable();
            $table->string('native')->nullable();
            $table->string('region')->nullable();
            $table->string('subregion')->nullable();
            $table->json('timezones')->nullable();
            $table->json('translations')->nullable();
            $table->json('languages')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('emoji', 10)->nullable();
            $table->string('emojiU', 20)->nullable();
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
