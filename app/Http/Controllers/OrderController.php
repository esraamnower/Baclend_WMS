<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();
        $pageTitle = "جميع الطلبات";

        // فحص الفلتر الجاي من الداشبورد
        if ($request->has('filter')) {
            $filter = $request->filter;

            if ($filter == 'pending') {
                $query->where('status', 'بانتظار الاعتماد')->orWhere('status', 'جديد');
                $pageTitle = "طلبات بانتظار الاعتماد";
            } elseif ($filter == 'today') {
                $query->whereDate('created_at', Carbon::today());
                $pageTitle = "طلبات اليوم";
            } elseif ($filter == 'month') {
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
                $pageTitle = "طلبات هذا الشهر";
            } elseif ($filter == 'rejected') {
                $query->where('status', 'مرفوض');
                $pageTitle = "الطلبات المرفوضة";
            }
        }

        $orders = $query->get();

        return view('orders.index', compact('orders', 'pageTitle'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'action' => 'required|string|in:موافقة,رفض',
            'notes' => 'required|string',
        ]);

        $status = $request->action == 'موافقة' ? 'تمت الموافقة' : 'مرفوض';

        $order->update(['status' => $status]);

        return back()->with('success', "تم $request->action الطلب بنجاح.");
    }
}