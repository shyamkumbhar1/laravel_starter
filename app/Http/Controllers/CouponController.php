<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
 
    public function index()
    {
        $result['data'] = Coupon::all();
        return view('admin.coupon', $result);
    }

 
    public function manage_coupon(Request $request, $id = ' ')
    {
        if ($id > 0) {
            // echo "edit Mode";
            $arr = Coupon::where(['id' => $id])->get();
            $result['title'] = $arr[0]->title;
            $result['code'] = $arr[0]->code;
            $result['value'] = $arr[0]->value;
            $result['id'] = $arr[0]->id;
        } else {
            // echo "ADD Mode";
            $result['title'] = '';
            $result['code'] = '';
            $result['value'] = '';
            $result['id'] = '';
        }
        // echo "<pre>";
        // print_r($result);
        // die();

        return view('admin.manage_coupon', $result);
    }
    public function manage_coupon_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'title' => 'required',
            'code' => 'required | unique:coupons,code,'.$request->post('id'),
            'value' => 'required',
        ]);

        if ($request->post('id') > 0) {
            $coupon = Coupon::find($request->post('id'));
            $msg = "Coupon Update Succesfully";
        } else {
            $coupon = new Coupon();
            $msg = "Coupon Insert Succesfully";
        }

        $coupon->title =  $request->post('title');
        $coupon->code = $request->post('code');
        $coupon->value = $request->post('value');
        $coupon->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/coupon');
    }
    public function delete(Request $request, $id)
    {
        // return $request->get('id');
        // dd($request->all(),$id);
        $coupon = Coupon::find($id);
        $coupon->delete();
        $request->session()->flash('message', 'Coupon Delete Succesfully');
        return redirect('admin/coupon');
    }
 

  
}
