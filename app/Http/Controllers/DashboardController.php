<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Order;
use App\Models\Lab;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. إحصائيات المخزون (تعتمد فقط على الأعمدة الموجودة عندك)
        $totalItems = Item::count(); 
        $totalCategories = Category::count(); 
        
        // بما أننا لا نملك عمود 'status' حالياً، سنتركها 0 مؤقتاً 
        $damagedItems = 0; 
        $missingItems = 0;
        
        // المواد التي رصيدها الحالي أقل من أو يساوي 5 (كمثال لمنخفضة المخزون)
        $lowStockItems = Item::where('current_stock', '<=', 5)->count(); 

        // 2. إحصائيات الطلبات
        $todayOrders = Order::whereDate('created_at', today())->count();
        $monthOrders = Order::whereMonth('created_at', now()->month)->count();
        
        // إذا كان جدول الطلبات لا يحتوي على عمود 'status'، سنستبدلها بـ 0
        $rejectedOrders = 0; 
        
        // المتغير الناقص اللي عم تطلبه واجهة الداشبورد:
        $pendingOrders = 0; 

        $topLab = "مخبر الشبكات (Lab 3)"; 
        $topTrainer = "أ. أحمد محمود";

        // أضفنا 'pendingOrders' في دالة compact لتروح للواجهة
        return view('dashboard', compact(
            'totalItems', 'totalCategories', 'lowStockItems', 
            'damagedItems', 'missingItems', 'todayOrders', 
            'monthOrders', 'rejectedOrders', 'topLab', 'topTrainer', 'pendingOrders'
        ));
    }
}