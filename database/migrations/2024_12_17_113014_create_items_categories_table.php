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
        Schema::create('items_categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name', 255);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('cat_brief', 255)->nullable();
            $table->boolean('status')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->useCurrent();

            // Foreign Keys
            $table->foreign('parent_id')->references('id')->on('items_categories');
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('updated_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_categories');
    }
};
