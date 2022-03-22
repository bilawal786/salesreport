<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    public function index()
    {
        $users = User::where('role', 1)->get();
        return view('admin.department.index', compact('users'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $lead = new User();
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->password = Hash::make($request->password);
        $lead->save();
        $notification = array(
            'messege' => 'Department Created Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request, $id)
    {

        $lead = User::find($id);
        $lead->name = $request->name;
        $lead->email = $request->email;
        if ($request->password) {
            $lead->password = Hash::make($request->password);
        }
        $lead->save();
        $notification = array(
            'messege' => 'Department Created Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function delete(Request $request, $id)
    {

        $lead = User::find($id);
        $lead->delete();
        $notification = array(
            'messege' => 'Department Deleted Successfully!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}
