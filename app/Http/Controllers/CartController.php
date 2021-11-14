<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('isCustomer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (auth()->user()->role_id != 3) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'keterangan' => 'required|string',
            'quantity' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $cart = Cart::create(array_merge($validator->validated(), ['catalogue_id' => $request->id, 'user_id' => auth()->user()->id]));
            $response = [
                'message' => 'Added to cart',
                'data' => $cart,
            ];
            if($request->ajax()){
                return response()->json($response, Response::HTTP_CREATED);
            }
            
            Alert::success('Berhasil','Berhasil menambahkan ke keranjang');
            return redirect()->back();
        } catch (QueryException $e) {
            if($request->ajax()){
                return response()->json([
                    'message' => 'Failed '.$e,
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
            Alert::error('Gagal','Gagal '.$e);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();
            $response = [
                'message' => 'Cart Deleted',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ]);
        }
    }
}
