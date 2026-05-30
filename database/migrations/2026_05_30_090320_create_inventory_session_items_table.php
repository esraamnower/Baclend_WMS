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
    Schema::create('inventory_session_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('inventory_session_id')->constrained('inventory_sessions')->onDelete('cascade');
        $table->foreignId('item_id')->constrained('items');
        $table->integer('system_quantity'); // الكمية اللي مسجلة بالنظام
        $table->integer('actual_quantity'); // الكمية الفعلية اللي انعدت باليد
        $table->integer('difference')->default(0); // الفرق (فائض أو عجز)
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_session_items');
    }
};
