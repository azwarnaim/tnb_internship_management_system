<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplyInternships;

class ListOfApprove extends Controller
{
    public function index()
    {
        $list = ApplyInternships::all();
        return view('admin.list-approve')->with('list',$list);
    }
}
