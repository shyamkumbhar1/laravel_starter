<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
        return view('admin.category', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_category(Request $request, $id = ' ')
    {
        if ($id > 0) {
            // echo "edit Mode";
            $arr = Category::where(['id' => $id])->get();
            $result['category_name'] = $arr[0]->category_name;
            $result['category_slug'] = $arr[0]->category_slug;
            $result['id'] = $arr[0]->id;
        } else {
            // echo "ADD Mode";
            $result['category_name'] = '';
            $result['category_slug'] = '';
            $result['id'] = '';
        }
        // echo "<pre>";
        // print_r($result);
        // die();

        return view('admin.manage_category', $result);
    }
    public function manage_category_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required | unique:categories,category_slug,'.$request->post('id'),
        ]);

        if ($request->post('category_name') > 0) {
            $category = Category::find($request->post('id'));
            $msg = "Category Update Succesfully";
        } else {
            $category = new Category();
            $msg = "Category Insert Succesfully";
        }
        $category->category_name = $request->post('category_name');
        $category->category_slug = $request->post('category_slug');
        $category->status = 1;
        $category->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/category');
    }
    public function delete(Request $request, $id)
    {
        // return $request->get('id');
        // dd($request->all(),$id);
        $category = Category::find($id);
        $category->delete();
        $request->session()->flash('message', 'Category Delete Succesfully');
        return redirect('admin/category');
    }
    public function status(Request $request, $status,$id)
    {
        
        // dd($request->all(),$id,$status);
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        $request->session()->flash('message', 'Category Status Update Succesfully');
        return redirect('admin/category');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        //
    }
}
