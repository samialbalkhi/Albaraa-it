<?php

use App\Models\Brand;
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
        Schema::create('prodacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('list_of_details');
            $table->string('image');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->foreignIdFor(Brand::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodacts');
    }
};
