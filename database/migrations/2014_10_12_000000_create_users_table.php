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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('author_name')->unique();
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->enum("gender",['male','female','other'])->default("other");
            $table->string('phone_no')->unique()->nullable();
            $table->text('address')->nullable();
            $table->boolean("is_admin")->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
