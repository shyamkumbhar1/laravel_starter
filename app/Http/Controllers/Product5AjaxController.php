<?php

namespace App\Http\Controllers;

use App\Models\Product5;
use Illuminate\Http\Request;
use DataTables;

class Product5AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);

        if ($request->ajax()) {

            $data = Product5::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('product5.productAjax');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product5::updateOrCreate([
                    'id' => $request->product_id
                ],
                [
                    'name' => $request->name,
                    'detail' => $request->detail,
                    'email' => $request->email
                ]);

        return response()->json(['success'=>'Product5 saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product5  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product5::find($id);
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product5  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product5::find($id)->delete();

        return response()->json(['success'=>'Product5 deleted successfully.']);
    }
}
