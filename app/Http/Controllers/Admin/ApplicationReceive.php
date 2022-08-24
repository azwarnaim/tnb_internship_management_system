<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplyInternships;
use Session;

class ApplicationReceive extends Controller
{
    public function index()
    {   
        $students = ApplyInternships::all();
        return view('admin.intern-application')->with('students',$students);
    }

    public function approve(Request $request, $id)
    {
        $students = ApplyInternships::find($id);
        $students->update(['status' => 'terima']);
        // $student->update();

        Session::flash('statuscode','info');
        return redirect('/applicationreceive')->with('status','Succecssful!');
    }

    public function reject(Request $request, $id)
    {
        $students = ApplyInternships::find($id);
        $students->update(['status' => 'reject']);

        Session::flash('statuscode','info');
        return redirect('/applicationreceive')->with('status','Rejected!');
    }
}
