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
        Schema::create('admins_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 191)->nullable();
            $table->string('last_name', 191)->nullable();
            $table->string('phone', 16)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('possition', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('image', 191)->nullable();
            $table->date('dob');
            $table->unsignedBigInteger('user_id');
            $table->string('natId', 16)->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('admins')
                  ->onDelete('cascade');

            $table->index('user_id', 'users_profiles_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins_profiles');
    }
};
