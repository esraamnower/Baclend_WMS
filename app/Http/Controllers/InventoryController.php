<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryAudit;

class InventoryController extends Controller
{
    public function index()
    {
        $audits = InventoryAudit::latest()->paginate(10);
        return view('inventory.index', compact('audits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // هنا يتم كتابة كود تجميد الأرصدة وإنشاء الجلسة
        return back()->with('success', 'تم إنشاء جلسة الجرد وتجميد الأرصدة بنجاح.');
    }

    public function resolve(Request $request)
    {
        $request->validate([
            'decision' => 'required|string',
        ]);

        // هنا سيتم كتابة كود تسوية الفروقات وتعديل الأرصدة الفعلي
        return back()->with('success', 'تمت تسوية الفروقات وتعديل الأرصدة بنجاح.');
    }

    public function close(Request $request)
    {
        // هنا سيتم كتابة كود إغلاق جلسة الجرد واعتماد النتيجة النهائية
        return back()->with('success', 'تم اعتماد نتيجة الجرد وإغلاق الجلسة نهائياً بنجاح.');
    }
}