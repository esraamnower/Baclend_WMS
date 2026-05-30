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
    Schema::table('borrow_requests', function (Blueprint $table) {
        // ضفنا الحقل ليكون اختياري (nullable) لأنه ممكن طلب يكون لمكتب مو لمخبر
        $table->foreignId('lab_id')->nullable()->after('user_id')->constrained('labs')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('borrow_requests', function (Blueprint $table) {
        $table->dropForeign(['lab_id']);
        $table->dropColumn('lab_id');
    });
}
   
};
