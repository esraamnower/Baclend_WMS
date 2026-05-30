<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ItemsExport;

class ItemController extends Controller
{
    private function getFilteredData($type)
    {
        $query = Item::query();
        $pageTitle = "جميع المواد";

        if ($type == 'low_stock') {
            $query->where('current_stock', '<=', 5);
            $pageTitle = "المواد منخفضة المخزون";
        } elseif ($type == 'damaged') {
            $query->where('id', '<', 0); // مؤقت لحين إضافة عمود الحالة
            $pageTitle = "المواد التالفة";
        } elseif ($type == 'missing') {
            $query->where('current_stock', 0); // المواد الناقصة هي التي رصيدها صفر
            $pageTitle = "المواد الناقصة";
        } elseif ($type == 'most_used') {
            // الترتيب من الأكثر استخداماً للأقل (الفرق بين الرصيد الابتدائي والحالي)
            $query->orderByRaw('(initial_balance - current_stock) DESC');
            $pageTitle = "أكثر المواد استخداماً";
        }

        return ['items' => $query->get(), 'pageTitle' => $pageTitle];
    }

    public function index(Request $request)
    {
        $currentType = $request->type ?? 'all';
        $data = $this->getFilteredData($currentType);
        
        $items = $data['items'];
        $pageTitle = $data['pageTitle'];

        return view('items.index', compact('items', 'pageTitle', 'currentType'));
    }

    public function exportExcel(Request $request)
    {
        $data = $this->getFilteredData($request->type);
        return Excel::download(new ItemsExport($data['items']), 'inventory_report.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $data = $this->getFilteredData($request->type);
        $items = $data['items'];
        $pageTitle = $data['pageTitle'];
        
        $pdf = Pdf::loadView('items.pdf', compact('items', 'pageTitle'));
        return $pdf->download('inventory_report.pdf');
    }
}