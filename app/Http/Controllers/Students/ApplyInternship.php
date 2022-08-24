<?php

namespace App\Http\Controllers\Students;

use Illuminate\Support\Facades\DB;
use App\Models\ApplyInternships;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;


class ApplyInternship extends Controller
{
    public function index()
    {   
        $apply = ApplyInternships::all();
        return view('student.application',compact('apply'));
               
    }

    public function create(Request $request)
    {   
        $apply = new ApplyInternships ;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('upload/image/', $filename);
            $apply->image = $filename;
        }else{
            return $request;
            $apply->image = '';
        }

        $apply->name = $request->input('name');
        $apply->age = $request->input('age');
        $apply->education = $request->input('education');
        $apply->courses = $request->input('courses');
        $apply->contactno = $request->input('contactno');
        $apply->email = $request->input('email');
        $apply->objective = $request->input('objective');
        $apply->supervisor = $request->input('supervisor');
        $apply->department = $request->input('department');
        $apply->start = $request->input('start');
        $apply->end = $request->input('end');
        
        if($request->hasfile('file')){
            $file2 = $request->file('file');
            $extension2 = $file2->getClientOriginalExtension(); //getting image extension
            $filename2 = time() . '.' . $extension2;
            $file2->move('upload2/file/', $filename2);
            $apply->file = $filename2;
        }else{
            return $request;
            $apply->file = '';
        }

        $apply->status = $request->input('status');

        $apply->save();
        Session::flash('statuscode','success');
        return redirect('index')->with('status','Your Application has been sent!')->with('status2','Diminta bersabar ya!');
    }

    public function edit($email)
    {
        // $apply = ApplyInternships::findOrFail($email);
        // return view('student.edit')->with('apply',$apply);

        $students = DB::table('users')
                    ->join('applyinternship', 'users.email', '=' ,'applyinternship.email')
                    ->select('applyinternship.name', 'applyinternship.age',  'applyinternship.courses', 'applyinternship.contactno', 'applyinternship.email', 'applyinternship.objective', 'applyinternship.start', 'applyinternship.end', 'applyinternship.education', 'applyinternship.id')
                    ->where('applyinternship.email', '=' , $email)
                    ->get();

                    return view('student.edit',['students' => $students]);
    }

    public function update(Request $request, $email)
    {
        $apply = ApplyInternships::find($email);
        
        $apply->name = $request->input('name');
        $apply->age = $request->input('age');
        $apply->courses = $request->input('courses');
        $apply->education = $request->input('education');
        $apply->contactno = $request->input('contactno');
        $apply->email = $request->input('email');
        $apply->objective = $request->input('objective');
        $apply->supervisor = $request->input('supervisor');
        $apply->department = $request->input('department');
        $apply->start = $request->input('start');
        $apply->end = $request->input('end');
        
      
        $apply->update();

        Session::flash('statuscode','info');
        return redirect('edit-apply/{email}')->with('status','Update Successful!');
    }

    public function viewstatus($email)
    {
        // $apply = ApplyInternships::findOrFail($email);
        // return view('student.edit')->with('apply',$apply);

        $students = DB::table('users')
                    ->join('applyinternship', 'users.email', '=' ,'applyinternship.email')
                    ->select('applyinternship.status','applyinternship.id','applyinternship.name')
                    ->where('applyinternship.email', '=' , $email)
                    ->get();

                    return view('student.view-status',['students' => $students]);
    }
    
}

