<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplyInternships;
use App\Models\Department;
use Session;

class Assign extends Controller
{
    public function index()
    {   
        $assign = ApplyInternships::all();
        $assign2 = Department::all();
        return view('admin.assign-department')->with('assign',$assign)->with('assign2',$assign2);
    }

    public function edit($id)
    {
        $assign = ApplyInternships::findOrFail($id);
        $assign2 = Department::all();
        
        return view('admin.assign-update')->with('assign',$assign)->with('assign2',$assign2);
    }

    public function update(Request $request,$id)
    {
        $assign = ApplyInternships::find($id);
      
        $assign -> department = $request->input('department');
        $assign-> supervisor = $request->input('supervisor');
       
        $assign->update();

        Session::flash('statuscode','info');
        return redirect('assign-department')->with('status','Update Success!');
    }
}
