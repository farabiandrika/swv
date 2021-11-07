<?php

namespace App\Http\Controllers;

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
}
