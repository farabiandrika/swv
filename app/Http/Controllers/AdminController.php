<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('isAdmin')->except('logout');
    // }

    public function karyawan() {
        return view('admin.pages.karyawan');
    }

    public function laporan() {
        return view('admin.pages.laporan');
    }
    
    public function setting() {
        return view('admin.pages.setting');
    }

    public function getLaporan(Request $request) {
        try {
            $bulan = Carbon::createFromFormat('d/m/Y', '01/' . $request->month)->format('d-m-Y');
            $mulai_waktu = new Carbon($bulan);
            $akhir_waktu = new Carbon($bulan);
            $waktu = [$mulai_waktu, $akhir_waktu];

            $laporan = Catalogue::with(['carts' => function($query) use ($waktu) {
                $query->whereHas('transaction', function($query2) use ($waktu) {
                    $query2->where('status', '=',2)->whereBetween('updated_at', [$waktu[0]->startOfMonth(), $waktu[1]->endOfMonth()]);
                });
            }])->get();
            
            return DataTables::of($laporan)
                ->addIndexColumn()
                ->addColumn('totalPembelian', function($row) {
                    return $row->carts->sum('quantity'). ' Pcs';
                })
                ->addColumn('totalHarga', function($row) {
                    return 'Rp. ' .number_format($row->carts->sum('quantity') * $row->price,0,',','.');
                })
                ->rawColumns(['totalPembelian', 'totalHarga'])
                ->make(true);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed get laporan'. $e
            ]);
        }
    }
}