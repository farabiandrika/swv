<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

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

    public function getTransaction() {
        try {
            $transaction = Transaction::with(['user','carts'])->get();

            return DataTables::of($transaction)
                ->addIndexColumn()
                ->addColumn('waktu', function($row) {
                    return $row->created_at->isoFormat('DD-MM-YYYY');
                })
                ->addColumn('total_rp', function($row) {
                    return 'Rp.' .number_format($row->total,0,',','.');
                })
                ->addColumn('action', function($row){
                    if ($row->status == 0 && $row->bukti_bayar != null) {
                        $actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-target="#konfirmPembarayan" data-id="'.$row->id.'" class="konfirmPembayaran btn btn-secondary btn-sm"><i class="zmdi zmdi-check"></i></a><a href="javascript:void(0)" data-toggle="modal" data-target="#detail" data-id="'.$row->id.'" class="detail btn btn-info btn-sm"><i class="zmdi zmdi-info"></i></a>';
                    } else {
                        $actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-target="#detail" data-id="'.$row->id.'" class="detail btn btn-info btn-sm"><i class="zmdi zmdi-info"></i></a>';
                    }
                    return $actionBtn;
                })
                ->addColumn('item', function($row) {
                    $value = [];
                    foreach ($row->carts as $key => $cart) {
                        $value[$key] = $key+1 . '. ' . $cart->catalogue->name .' - Rp. '. number_format($cart->catalogue->price * $cart->quantity,0,',','.').' ('.$cart->quantity.' pcs)';
                    }
                    return $value;
                })
                ->addColumn('status_convert', function($row) {
                    if ($row->status == 0 && $row->bukti_bayar == null) {
                        $status = 'Belum Bayar';
                        $style = 'btn-danger';
                    } else if ($row->status === 0 && $row->bukti_bayar != null) {
                        $status = 'Sudah Bayar';
                        $style = 'btn-info';
                    } else if ($row->status == 1) {
                        $status = 'Sudah Dikirim';
                        $style = 'btn-info';
                    } else {
                        $status = 'Sukses';
                        $style = 'btn-success';
                    }
                    // $final = '<span class="btn btn-sm '.$style.'">'.$status.'</span>';
                    return $status;
                })
                ->rawColumns(['action','total_rp', 'status_convert', 'item'])
                ->make(true);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateResi(Request $request) {
        try {
            $transaksi =  Transaction::findOrFail($request->id_transaksi);
            $transaksi->resi = $request->no_resi;
            $transaksi->status = 1;
            $transaksi->save();
            $response = [
                'message' => 'Berhasil update resi',
                'data' => $transaksi,
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
