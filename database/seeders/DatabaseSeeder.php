<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Order;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    $this->call([
        RolesAndAdminSeeder::class,
        SystemSeeder::class,
    ]);

    // إضافة تصنيفات أولاً (لأن الـ items بيعتمدوا عليها)
    $cat = \App\Models\Category::create(['name' => 'أجهزة حاسوب']);

    // إضافة مواد بأسماء الأعمدة الصحيحة
    \App\Models\Item::create([
        'name_en' => 'Dell Monitor',
        'name_ar' => 'شاشة ديل',
        'current_stock' => 5,
        'category_id' => $cat->id
    ]);

    \App\Models\Item::create([
        'name_en' => 'HDMI Cable',
        'name_ar' => 'كابل HDMI',
        'current_stock' => 2,
        'category_id' => $cat->id
    ]);
}
}
