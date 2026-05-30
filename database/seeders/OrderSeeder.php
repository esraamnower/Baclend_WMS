<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // تجهيز مصفوفة بطلبات مختلفة الحالات لاختبار الفلاتر
        $orders = [
            [
                'user_id' => 1, 
                'destination' => 'مخبر الشبكات (Lab 3)', 
                'priority' => 'حساس', 
                'status' => 'بانتظار الاعتماد', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1, 
                'destination' => 'مخبر البرمجيات (Lab 1)', 
                'priority' => 'عادي', 
                'status' => 'تمت الموافقة', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2, 
                'destination' => 'قسم الإدارة', 
                'priority' => 'عادي', 
                'status' => 'مرفوض', 
                'created_at' => Carbon::now()->subDays(3), // طلب من 3 أيام
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'user_id' => 2, 
                'destination' => 'مخبر الصيانة', 
                'priority' => 'عادي', 
                'status' => 'جديد', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1, 
                'destination' => 'مخبر الشبكات (Lab 2)', 
                'priority' => 'حساس', 
                'status' => 'بانتظار الاعتماد', 
                'created_at' => Carbon::now()->subMonths(1), // طلب من شهر لاختبار فلتر "هذا الشهر"
                'updated_at' => Carbon::now()->subMonths(1),
            ],
        ];

        // إدخال البيانات في جدول الطلبات
        DB::table('orders')->insert($orders);
    }
}