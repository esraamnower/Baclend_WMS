<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // جلب كل الأصناف من قاعدة البيانات
        $categories = Category::all();
        $pageTitle = "جميع الأصناف";
        
        return view('categories.index', compact('categories', 'pageTitle'));
    }
}