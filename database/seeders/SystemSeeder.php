<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InventoryAudit;
use App\Models\Maintenance;
use App\Models\ActivityLog;
use App\Models\Setting;
use App\Models\User;
use App\Models\Item;

class SystemSeeder extends Seeder
{
    public function run()
    {
        // 1. إعدادات افتراضية
        Setting::insert([
            ['key' => 'site_name', 'value' => 'نظام إدارة المستودعات', 'type' => 'string'],
            ['key' => 'maintenance_mode', 'value' => '0', 'type' => 'boolean'],
            ['key' => 'currency', 'value' => 'ل.س', 'type' => 'string'],
        ]);

        // 2. سجلات جرد
        InventoryAudit::create([
            'title' => 'الجرد السنوي لعام 2024',
            'scheduled_date' => now()->addDays(10),
            'status' => 'pending',
            'notes' => 'جرد شامل لمخبر الشبكات والبرمجيات.'
        ]);

        // 3. سجلات الأنشطة (Activity Logs)
        $user = User::first();
        if ($user) {
            ActivityLog::insert([
                ['user_id' => $user->id, 'action' => 'login', 'description' => 'تسجيل دخول للنظام', 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $user->id, 'action' => 'create_item', 'description' => 'إضافة مادة جديدة للمستودع', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        // 4. سجلات الصيانة
        $item = Item::first();
        if ($item) {
            Maintenance::create(['item_id' => $item->id, 'description' => 'عطل في اللوحة الأم', 'status' => 'repairing', 'cost' => 50000]);
            Maintenance::create(['item_id' => $item->id, 'description' => 'تلف في شاشة العرض', 'status' => 'scrapped', 'cost' => 0]);
        }
    }
}
