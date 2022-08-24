<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApplyInternships;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class StudentsController extends Controller
{
    public function index()
    {   
        $students = ApplyInternships::all();
        return view('admin.add-student',compact('students'));
                // ->with('add-student',$students);
    }

    public function store(Request $request)
    {   
        $students = new ApplyInternships ;

        $students->name = $request->input('name');
        $students->courses = $request->input('courses');
        $students->uni = $request->input('uni');
        $students->phone = $request->input('phone');
        $students->address = $request->input('address');
        $students->start = $request->input('start');
        $students->end = $request->input('end');

        $students->save();
        Session::flash('statuscode','success');
        return redirect('add-student')->with('status','Data Added!');
    }

    public function edit($id)
    {
        $students = ApplyInternships::findOrFail($id);
        return view('admin.update-student')
                ->with('students',$students);
    }

    public function update(Request $request, $id)
    {
        $students = ApplyInternships::find($id);
        $students->name = $request->input('name');
        $students->age = $request->input('age');
        $students->education = $request->input('education');
        $students->courses = $request->input('courses');
        $students->contactno = $request->input('contactno');
        $students->email = $request->input('email');
        $students->objective = $request->input('objective');
        $students->supervisor = $request->input('supervisor');
        $students->department = $request->input('department');
        $students->start = $request->input('start');
        $students->end = $request->input('end');
        $students->update();
        
        Session::flash('statuscode','info');
        return redirect('/add-student')->with('status','Update Success!');
    }

    public function delete($id)
    {
        $students = ApplyInterships::findOrFail($id);
        $students->delete();

        Session::flash('statuscode','error');
        return redirect('add-student')->with('status','Data has been delete');
    }
}
