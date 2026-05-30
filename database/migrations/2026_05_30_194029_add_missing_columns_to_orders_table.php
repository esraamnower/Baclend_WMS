<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // نستخدم فحص التأكد لتجنب خطأ "العمود موجود مسبقاً"
            if (!Schema::hasColumn('orders', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('orders', 'destination')) {
                $table->string('destination')->nullable()->after('id');
            }
            if (!Schema::hasColumn('orders', 'priority')) {
                $table->string('priority')->default('عادي')->after('destination');
            }
            if (!Schema::hasColumn('orders', 'notes')) {
                $table->text('notes')->nullable(); // عمود عشان نحفظ فيه سبب الرفض أو الموافقة
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['destination', 'priority', 'notes']);
        });
    }
};
