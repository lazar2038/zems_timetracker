<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'k.kochnov@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => null,
        ]);
        User::factory(2)->create();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::truncate();
    }
};
