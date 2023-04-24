<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class MultiRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $employee = Employee::all();

        return view('employee.index',['employee'=>$employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->hobby = json_encode($request->input('hobby'));
        $employee->save();

        return redirect ('multi-record')->with('insert_record','Record insert Sussesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Employee::find($id);
        return view('employee.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->input(), $id);
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->hobby = json_encode($request->input('hobby'));
        $employee->update();
        return redirect('multi-record')->with('update_message','Data Update Sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
       $data = Employee::find($id);
       $data->delete();
       
       return redirect('multi-record')->with('message_delete',"Data Delete Sucessfully");
  }
  public function destroy_multiple (Request $request)
{
    // Delete Multiple  Record
    // dd($request->input());
    $ids = $request->input('ids');

    Employee::whereIn('id',$ids)->delete();
    return redirect('multi-record')->with('delet_message','User Delete Sucesfully');
  
     
 
}

    
}
