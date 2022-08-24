<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplyInternships;
use Session;

class ApplicationLog extends Controller
{
    public function index()
    {
        $students = ApplyInternships::all();
        return view ('admin.application-log')->with('students',$students);
    }
}
