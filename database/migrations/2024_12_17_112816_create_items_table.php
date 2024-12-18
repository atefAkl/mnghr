<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->char('barcode', 14)->nullable();
            $table->string('name', 50)->nullable();
            $table->char('serial', 14)->nullable();
            $table->string('breif', 255)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->boolean('status')->nullable();
            $table->string('image', 255)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->useCurrent();

            // Foreign Keys
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('updated_by')->references('id')->on('admins');

            // Indexes
            $table->index('category_id');
            $table->index('created_by');
            $table->index('updated_by');
            $table->index('unit_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
