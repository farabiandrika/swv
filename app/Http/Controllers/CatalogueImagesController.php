<?php

namespace App\Http\Controllers;

use App\Models\CatalogueImages;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalogueImagesController extends Controller
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
     * @param  \App\Models\CatalogueImages  $catalogueImages
     * @return \Illuminate\Http\Response
     */
    public function show(CatalogueImages $catalogueImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CatalogueImages  $catalogueImages
     * @return \Illuminate\Http\Response
     */
    public function edit(CatalogueImages $catalogueImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CatalogueImages  $catalogueImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CatalogueImages $catalogueImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CatalogueImages  $catalogueImages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $catalogueImages = CatalogueImages::findOrFail($id);

            $imageLeft = CatalogueImages::where('catalogue_id', $catalogueImages->catalogue_id)->get();
            
            if (count($imageLeft)  <= 1) {
                return response()->json([
                    'message' => 'Failed To Delete',
                    'data' => ['At least 1 image for product'],
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            unlink('images/'.$catalogueImages->name);
            $catalogueImages->delete();

            $response = [
                'message' => 'Image Deleted',
                'data' => $imageLeft,
            ];
            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo,
            ]);
        }
    }
}
