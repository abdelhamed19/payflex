<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('provider_id')->nullable()->unique();
            $table->string('provider')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('lang')->nullable();
            $table->string('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '123456789',
            'phone' => '123456789',
            'image' => null,
            'is_active' => 1,
            'lang' => null,
            'address' => '123 Main St, City, Country',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
