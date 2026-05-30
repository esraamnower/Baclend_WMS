<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemsExport implements FromCollection, WithHeadings
{
    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return $this->items->map(function($item) {
            return [
                'id' => $item->id,
                'name_ar' => $item->name_ar,
                'name_en' => $item->name_en,
                'initial_balance' => $item->initial_balance,
                'current_stock' => $item->current_stock,
            ];
        });
    }

    public function headings(): array
    {
        return ['الرقم', 'الاسم (عربي)', 'الاسم (إنكليزي)', 'الرصيد الأساسي', 'الرصيد الحالي'];
    }
}