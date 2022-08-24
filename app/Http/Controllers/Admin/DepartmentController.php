<?php

namespace App\Http\Controllers\Admin;


use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.department',compact('departments'));

    }

    public function store(Request $request)
    {
        $departments = new Department;

        $departments->name = $request->input('name');
        $departments->supervisor = $request->input('supervisor');

        $departments->save();
        Session::flash('statuscode','success');
        return redirect('department')->with('status','Data Added!');

    }

    public function edit($id)
    {
        $departments = Department::findOrFail($id);
        return view('admin.update-department')->with('departments',$departments);
    }

    public function update(Request $request, $id)
    {
        $departments = Department::find($id);
        $departments->name = $request->input('name');
        $departments->supervisor = $request->input('supervisor');
        $departments->update();

        Session::flash('statuscode','info');
        return redirect('department')->with('status','Update Successful!');
    }

    public function delete($id)
    {
        $departments = Department::findOrFail($id);
        $departments->delete();

        Session::flash('statuscode','error');
        return redirect('department')->with('status','Data has been deleted!');
    }
}
