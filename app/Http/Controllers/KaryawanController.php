<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('isKaryawan');
    }

    public function index() {
        return view('admin.pages.index');
    }

    public function transaksi() {
        return view('admin.pages.transaksi');
    }

    public function category() {
        return view('admin.pages.category');
    }

    public function product() {
        $categories = Category::all();
        return view('admin.pages.product', compact('categories'));
    }
}
