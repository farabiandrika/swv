<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\CatalogueImages;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $catalogues = Catalogue::where('isActive', 1)->with('category')->with('images')->get();

            return Datatables::of($catalogues)
                ->addIndexColumn()
                ->addColumn('price_rp', function($row) {
                    return "Rp " . number_format($row->price,2,',','.');
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'" class="edit btn btn-secondary btn-sm"><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','price_rp'])
                ->make(true);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'size' => 'required|string|max:255',
                'stock' => 'required|numeric',
                'description' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'category_id' => 'required',
                'price' => 'required|numeric',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Failed To Create',
                    'data' => $validator->errors(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $catalogue = Catalogue::create(array_merge($validator->validated(), ['slug' => Str::slug($request->name)]));

            for ($i=0; $i < count($request->gambar); $i++) { 
                $imageName = $catalogue->slug.'_'.time().'_'.$i.'.'.$request->gambar[$i]->extension();  
                $request->gambar[$i]->move('images', $imageName);
                CatalogueImages::create([
                    'name' => $imageName,
                    'catalogue_id' => $catalogue->id,
                ]);
            }

            $response = [
                'message' => 'Product Created',
                'data' => $catalogue,
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Catalogue::where('id',$id)->with(['category', 'images'])->first();
            $categories = Category::all();

            $response = [
                'message' => 'Product Obtained',
                'data' => $product,
                'categories' => $categories,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $catalogue = Catalogue::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'size' => 'required|string|max:255',
                'stock' => 'required|numeric',
                'description' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'category_id' => 'required',
                'price' => 'required|numeric',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Failed To Create',
                    'data' => $validator->errors(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $catalogue->update(array_merge($validator->validated(), ['slug' => Str::slug($request->name)]));
            // $catalogue = Catalogue::create(array_merge($validator->validated(), ['slug' => Str::slug($request->name)]));

            for ($i=0; $i < count($request->gambar); $i++) { 
                $imageName = $catalogue->slug.'_'.time().'_'.$i.'.'.$request->gambar[$i]->extension();  
                $request->gambar[$i]->move('images', $imageName);
                CatalogueImages::create([
                    'name' => $imageName,
                    'catalogue_id' => $catalogue->id,
                ]);
            }

            $response = [
                'message' => 'Product Updated',
                'data' => $catalogue,
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateV2(Request $request, $id)
    {
        try {
            $catalogue = Catalogue::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'size' => 'required|string|max:255',
                'stock' => 'required|numeric',
                'description' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'category_id' => 'required',
                'price' => 'required|numeric',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Failed To Create',
                    'data' => $validator->errors(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $catalogue->update(array_merge($validator->validated(), ['slug' => Str::slug($request->name)]));
            // $catalogue = Catalogue::create(array_merge($validator->validated(), ['slug' => Str::slug($request->name)]));

            if ($request->gambar) {
                for ($i=0; $i < count($request->gambar); $i++) { 
                    $imageName = $catalogue->slug.'_'.time().'_'.$i.'.'.$request->gambar[$i]->extension();  
                    $request->gambar[$i]->move('images', $imageName);
                    CatalogueImages::create([
                        'name' => $imageName,
                        'catalogue_id' => $catalogue->id,
                    ]);
                }
            }

            $response = [
                'message' => 'Product Updated',
                'data' => $catalogue,
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
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $catalogue = Catalogue::find($id);
            $images = CatalogueImages::where('catalogue_id', $catalogue->id)->get();
            foreach ($images as $key => $image) {
                unlink('images/'.$image->name);
                $image->delete();
            }

            $catalogue->delete();

            $response = [
                'message' => 'Product Deleted',
            ];
            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e->errorInfo,
            ]);
        }
    }
}
