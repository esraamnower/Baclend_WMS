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
    Schema::create('inventory_sessions', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // اسم الجرد (مثال: جرد نهاية العام 2026)
        $table->foreignId('created_by')->constrained('users'); // أمين المستودع اللي عمل الجرد
        $table->foreignId('approved_by')->nullable()->constrained('users'); // رئيس القسم اللي اعتمد الجرد
        $table->enum('status', ['open', 'completed', 'approved'])->default('open');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_sessions');
    }
};
