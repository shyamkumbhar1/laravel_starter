<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\User;

class UserController extends Controller
{
    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
    //    dd($request->file('file'));
        Excel::import(new ImportUser, $request->file('file')->store('files'));
        // Excel::import(new ImportUser, $request->file('file'));
        // return redirect()->back();
        return redirect()->back()->with('success', 'File imported successfully!');

    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}