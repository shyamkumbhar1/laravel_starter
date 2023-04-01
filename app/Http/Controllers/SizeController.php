<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
 
    public function index()
    {
        $result['data'] = Size::all();
        return view('admin.size', $result);
    }

 
    public function manage_size(Request $request, $id = ' ')
    {
        if ($id > 0) {
            // echo "edit Mode";
            $arr = Size::where(['id' => $id])->get();
            $result['size'] = $arr[0]->title;
            $result['id'] = $arr[0]->id;
        } else {
            // echo "ADD Mode";
            $result['size'] = '';
            $result['id'] = '';
        }
        // echo "<pre>";
        // print_r($result);
        // die();

        return view('admin.manage_size', $result);
    }
    public function manage_size_process(Request $request)
    {

        // return $request->post();
        $request->validate([
            // 'size' => 'required',
            'size' => 'required | unique:sizes,size,'.$request->post('id'),
            // 'value' => 'required',
        ]);

        if ($request->post('id') > 0) {
            $size = Size::find($request->post('id'));
            $msg = "Size Update Succesfully";
        } else {
            $size = new Size();
            $msg = "Size Insert Succesfully";
        }

        $size->size =  $request->post('size');
        $size->status = 1;
        $size->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/size');
    }
    public function delete(Request $request, $id)
    {
        // return $request->get('id');
        // dd($request->all(),$id);
        $size = Size::find($id);
        $size->delete();
        $request->session()->flash('message', 'Size Delete Succesfully');
        return redirect('admin/size');
    }
    public function status(Request $request, $status, $id)
    {
        // return $request->get('id');
        // dd($request->all(),$id);
        $size = Size::find($id);
        $size->status = $status;
        $size->save();
        $request->session()->flash('message', 'Size  Update  Succesfully');
        return redirect('admin/size');
    }
 

  
}
