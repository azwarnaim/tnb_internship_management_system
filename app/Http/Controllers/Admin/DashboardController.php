<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class DashboardController extends Controller
{
    public function registered()
    {   
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }

    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->usertype = $request->input('usertype');
        $users->update();

        Session::flash('statuscode','info');
        return redirect('/role-register')->with('status','Update Success!');
    }

    public function registerdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        Session::flash('statuscode','error');
        return redirect('/role-register')->with('status','Deleted!');

    }

}
