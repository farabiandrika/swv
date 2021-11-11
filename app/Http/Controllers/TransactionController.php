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
    public function show(Transaction $transaction)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
