<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Product::all();
        return view('admin.product', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_product(Request $request, $id = ' ')
    {
        if ($id > 0) {
            // echo "edit Mode";
            $arr = Product::where(['id' => $id])->get();
            $result['category_id']=$arr[0]->category_id;
  $result['name']=$arr[0]->name;
  $result['image']=$arr[0]->image;
  $result['slug']=$arr[0]->slug;
  $result['brand']=$arr[0]->brand;
  $result['model']=$arr[0]->model;
  $result['short_desc']=$arr[0]->short_desc;
  $result['desc']=$arr[0]->desc;
  $result['keywords']=$arr[0]->keywords;
  $result['technical_specification']=$arr[0]->technical_specification;
  $result['uses']=$arr[0]->uses;
  $result['warranty']=$arr[0]->warranty;
  $result['status']=$arr[0]->status;
            $result['id'] = $arr[0]->id;


        } else {
            // echo "ADD Mode";
            $result['category_id']='';
            $result['name']='';
            $result['image']='';
            $result['slug']='';
            $result['brand']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['uses']='';
            $result['warranty']='';
            $result['status']='';
            $result['id'] = '';
        }
        

        // fetch Categoey Data

        $result['category'] = Db::table('categories')->where(['status'=>'1'])->get();
        
// echo "<pre>";
//         print_r($result['category']);
//         die();

        return view('admin.manage_product', $result);
    }
    public function manage_product_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validator = 'mimes:jpeg,jpg,png';
        } else {
            $image_validator = 'required|mimes:jpeg,jpg,png';

        }

             $request->validate([
            'name' => 'required',
            'image' => $image_validator,
            // 'slug' => 'required | unique:products,slug'.$request->post('id')
            // 'category_id' => 'required',
            // 'name' => 'required',
            // 'image' => 'required',
            // 'slug' => 'required',
            // 'brand' => 'required',
            // 'short_desc' => 'required',
            // 'model' => 'required',
            // 'desc' => 'required',
            // 'keywords' => 'required',
            // 'technical_specification' => 'required',
            // 'uses' => 'required',
            // 'warranty' => 'required',

        
        ]);

        if ($request->post('id') > 0) {
            $product = Product::find($request->post('id'));
            $msg = "Product Update Succesfully";
        } else {
            $product = new Product();
            $msg = "Product Insert Succesfully";
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . "." . $ext;
            $image->storeAs('public/media',$image_name);
            $product->image = $image_name;
            // dd($image,$ext,$image_name);
        } 
        
        $product->category_id = $request->post('category_id');
        $product->name = $request->post('name');
        // $product->image = $request->post('image');
        $product->slug = $request->post('slug');
        $product->brand = $request->post('brand');
        $product->short_desc = $request->post('short_desc');
        $product->model = $request->post('model');
        $product->desc = $request->post('desc');
        $product->keywords = $request->post('keywords');
        $product->technical_specification = $request->post('technical_specification');
        $product->uses = $request->post('uses');
        $product->warranty = $request->post('warranty');
        // $product->status = $request->post('status');
        $product->status = 1;
        $product->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }
    public function delete(Request $request, $id)
    {
        // return $request->get('id');
        // dd($request->all(),$id);
        $product = Product::find($id);
        $product->delete();
        $request->session()->flash('message', 'Product Delete Succesfully');
        return redirect('admin/product');
    }
    public function status(Request $request, $status,$id)
    {
        
        // dd($request->all(),$id,$status);
        $product = Product::find($id);
        $product->status = $status;
        $product->save();
        $request->session()->flash('message', 'Product Status Update Succesfully');
        return redirect('admin/product');
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
    public function edit(Product $product)
    {
        //
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

    public function destroy(Product $product)
    {
        //
    }
}
