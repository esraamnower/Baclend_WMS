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
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->foreignId('location_id')->nullable()->constrained('locations')->onDelete('set null');
        $table->string('name_en'); // الوصف الانكليزي
        $table->string('name_ar')->nullable(); // الوصف العربي
        $table->string('barcode')->unique()->nullable(); // الباركود للموبايل
        $table->integer('initial_balance')->default(0); // الرصيد الأساسي
        $table->integer('current_stock')->default(0); // الرصيد الحالي
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
