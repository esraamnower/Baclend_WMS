<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // 1. السماح للكتابة في هذه الأعمدة (Mass Assignment)
    protected $fillable = [
    'name_en', 
    'name_ar', 
    'barcode', 
    'initial_balance', 
    'current_stock', 
    'category_id', 
    'location_id'
]; 

    // 2. ربط المادة بالتصنيف (كل مادة بتنتمي لتصنيف)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ربط المادة بالموقع
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // ربط المادة بسجلات الصيانة
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}