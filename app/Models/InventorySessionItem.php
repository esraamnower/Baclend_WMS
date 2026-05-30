<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// إضافة HasFactory لتمكين الـ seeding و Factories مستقبلاً
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventorySessionItem extends Model
{
    use HasFactory;
    protected $fillable = ['inventory_session_id', 'item_id', 'system_quantity', 'actual_quantity', 'difference', 'notes'];

    public function inventorySession()
    {
        return $this->belongsTo(InventorySession::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
