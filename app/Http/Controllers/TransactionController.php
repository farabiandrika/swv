<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $transaction = Transaction::with('user')->get();

            return DataTables::of($transaction)
                ->addIndexColumn()
                ->addColumn('total_rp', function($row) {
                    return "Rp " . number_format($row->total,2,',','.');
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'" class="info btn btn-secondary btn-sm"><i class="zmdi zmdi-info"></i></a> <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','total_rp'])
                ->make(true);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed '.$e->errorInfo,]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $transaction1 = Transaction::where('id',$id)->with('carts')->with('user')->first();

            $response = [
                'message' => 'Transaction Obtained',
                'data' => $transaction1,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function updateV2(Request $request, $id)
    {
        try {
            $transaction = Transaction::findOrFail($id);

            $imageName = $transaction->id.'_'.time().'.'.$request->bukti_bayar->extension();  
            $request->bukti_bayar->move('bukti_bayar', $imageName);

            $transaction->bukti_bayar = $imageName;
            $transaction->save();

            $response = [
                'message' => 'Success Upload Bukti',
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        try {
            foreach ($transaction->carts as $key => $item) {
                $item->catalogue->stock += $item->quantity;
                $item->catalogue->save();
                $item->delete();
            }

            if ($transaction->bukti_bayar != null) {
                unlink('bukti_bayar/'.$transaction->bukti_bayar);
            }
            $transaction->delete();

            $response = [
                'message' => 'Transaction Deleted',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ]);
        }
    }

    public function pesananDiterima($id) {
        try {
            $transaction = Transaction::findOrFail($id);
            $transaction->status = 2;
            $transaction->save();

            $response = [
                'message' => 'Status Pesanan Diterima',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ]);
        }
    }
}
