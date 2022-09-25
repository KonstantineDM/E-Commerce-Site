<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function categories() {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code) {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category, $product = null) {
        return view('product', ['product' => $product]);
    }

    public function basket() {
        return view('basket', compact('basket'));
    }

    public function basketOrder() {
        return view('order', compact('order'));
    }
}
