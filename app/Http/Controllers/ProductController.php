<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::get();
        if ($request->ajax()) {
            $q_user = Product::with('category')->orderBy('title', 'asc')->get();
            return Datatables::of($q_user)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){     
                        $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editUser"><i class=" fi-rr-edit"></i></div>';
                        $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteUser"><i class="fi-rr-trash"></i></div>';
 
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('product.index',compact('categories'));
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
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // add the validation rule for the 'img' field
            // add the validation rules for the other fields here
        ]);
        $file = $request->file('img');
        if (!$file) {
            return response()->json(['error' => 'No file uploaded']);
        }
        if ($file->getSize() == 0) {
            return response()->json(['error' => 'File is empty']);
        }
        $imagePath = Storage::disk('public')->putFile('img', $file);

        Product::updateOrCreate(['id' => $request->user_id], [
            'title' => $request->title,
            'desc' => $request->desc,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'img' => $imagePath,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'Product saved successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $User = Product::find($product);
        return response()->json($User);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return response()->json(['success'=>'Category deleted!']);
    }
}