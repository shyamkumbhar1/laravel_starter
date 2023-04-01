<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
 
    public function index()
    {
        $result['data'] = Color::all();
        return view('admin.color', $result);
    }

 
    public function manage_color(Request $request, $id = ' ')
    {
        if ($id > 0) {
            // echo "edit Mode";
            $arr = Color::where(['id' => $id])->get();
            $result['color'] = $arr[0]->title;
            $result['id'] = $arr[0]->id;
        } else {
            // echo "ADD Mode";
            $result['color'] = '';
            $result['id'] = '';
        }
        // echo "<pre>";
        // print_r($result);
        // die();

        return view('admin.manage_color', $result);
    }
    public function manage_color_process(Request $request)
    {

        // return $request->post();
        $request->validate([
            // 'color' => 'required',
            'color' => 'required | unique:colors,color,'.$request->post('id'),
            // 'value' => 'required',
        ]);

        if ($request->post('id') > 0) {
            $color = Color::find($request->post('id'));
            $msg = "Color Update Succesfully";
        } else {
            $color = new Color();
            $msg = "Color Insert Succesfully";
        }

        $color->color =  $request->post('color');
        $color->status = 1;
        $color->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/color');
    }
    public function delete(Request $request, $id)
    {
        // return $request->get('id');
        // dd($request->all(),$id);
        $color = Color::find($id);
        $color->delete();
        $request->session()->flash('message', 'Color Delete Succesfully');
        return redirect('admin/color');
    }
    public function status(Request $request, $status, $id)
    {
        // return $request->get('id');
        // dd($request->all(),$id);
        $color = Color::find($id);
        $color->status = $status;
        $color->save();
        $request->session()->flash('message', 'Color  Update  Succesfully');
        return redirect('admin/color');
    }
 

  
}
