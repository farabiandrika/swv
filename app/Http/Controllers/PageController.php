<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $products = Catalogue::where('isActive', 1)->with('images')->get();
        return view('customer.pages.index', compact('products'));
    }
}
