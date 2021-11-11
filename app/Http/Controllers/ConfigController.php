<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ConfigController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $config = Config::first();
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'address' => 'required|string',
                'phone' => 'required|numeric',
                'email' => 'required|email',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if ($request->logo) {
                unlink('assets/images/'.$config->logo);

                $imageName = Str::slug($request->nama).'_'.time().'.'.$request->logo->extension();  
                $request->logo->move('assets/images/', $imageName);
                $config->update(['logo' => $imageName]);
            }

            $config->update($validator->validate());

            $response = [
                'message' => 'Config Created',
                'data' => $config,
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
